<?php
session_start();
include("conn.php");

if (!isset($_SESSION['u_id'])) {
    header("location:index2.php");
    exit();
}

$uid = $_SESSION['u_id'];
$email = $_SESSION['email'];

// Get product ID from URL
if (isset($_GET['a_id'])) {
    $aid = $_GET['a_id'];
    
    // Fetch product details
    $query1 = "SELECT * FROM accessories_tbl WHERE a_id='$aid'";
    $res = mysqli_query($conn, $query1);
    
    if ($res && mysqli_num_rows($res) > 0) {
        $product = mysqli_fetch_assoc($res);
        
        // Calculate pricing
        $price = floatval(preg_replace('/[^\d.]/', '', $product['price'])); // remove ₹, commas
        $mrp = isset($product['mrp']) ? floatval($product['mrp']) : $price * 1.2;
        $savings = $mrp - $price;
        $discount_percentage = ($mrp > 0) ? round(($savings / $mrp) * 100) : 0;

        $product_found = true;
    } else {
        $product_found = false;
    }
} else {
    $product_found = false;
}


// Fetch user addresses
$cid = $_SESSION['u_id'];
$sql2 = "SELECT * FROM address_tbl WHERE u_id = '$cid' LIMIT 1";
$result2 = mysqli_query($conn, $sql2);
$has_address = ($result2 && mysqli_num_rows($result2) > 0);
if ($has_address) {
    $address = mysqli_fetch_assoc($result2);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern E-commerce Cart</title>
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<style>
/* Using CSS Variables for easy color management */
:root {
    --primary-color: #0D9488; /* Teal */
    --secondary-color: #475569; /* Slate */
    --background-color: #F8F9FA;
    --card-border-color: #E9ECEF;
    --text-primary: #212529;
    --text-secondary: #6C757D;
    --accent-red: #EF4444;
    --accent-green: #10B981;
}

/* General Body Styles */
body {
    font-family: 'Nunito', sans-serif;
    background-color: var(--background-color);
    color: var(--text-primary);
    margin: 0;
    padding: 25px;
}

/* Main Container using Grid */
.container {
    display: grid;
    grid-template-columns: 2fr 1.2fr;
    gap: 25px;
    max-width: 1200px;
    margin: auto;
}

/* Card Styling - Border instead of Shadow */
.card {
    background-color: #ffffff;
    border-radius: 8px;
    border: 1px solid var(--card-border-color);
	border-top: 4px solid #ef4444ba;
    padding: 20px 25px;
    margin-bottom: 25px;
}

.card-header {
    padding-bottom: 15px;
    margin-bottom: 20px;
    border-bottom: 1px solid var(--card-border-color);
}

.card h2 {
    font-size: 1.1rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    color: var(--text-primary);
}

.card h2 i {
    margin-right: 12px;
    color: #ef4444b3;
}

/* Button Styles */
.btn {
    border: none;
    border-radius: 6px;
    padding: 14px 22px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-primary {
    background-color: #ef4444bf;
    color: #fff;
}
.btn-primary:hover {
    background-color: #eb0000;
    transform: translateY(-2px);
}

.btn-secondary {
    background-color: #F1F5F9;
    color: var(--secondary-color);
}
.btn-secondary:hover {
    background-color: #E2E8F0;
}

.btn i {
    margin-right: 8px;
}

/* --- Left Column --- */

/* Shipping Address Placeholder Style */
.shipping-address-placeholder {
    background-color: #F8FAFC;
    border: 2px dashed #CBD5E0;
    text-align: center;
    padding: 40px 25px;
}
.shipping-address-placeholder .card-header {
    border-bottom: none;
    justify-content: center;
}
.shipping-address-placeholder .icon-placeholder {
    font-size: 28px;
    color: #94A3B8;
    margin-bottom: 15px;
}
.shipping-address-placeholder h3 {
    margin: 0 0 8px 0;
    font-weight: 700;
}
.shipping-address-placeholder p {
    color: var(--text-secondary);
    margin-bottom: 25px;
}
.shipping-address-placeholder .btn {
    max-width: 220px;
    margin: auto;
}

/* Order Details Card */
.product-item {
    display: flex;
    align-items: center;
}
.product-item img {
    width: 90px;
    height: 90px;
    border-radius: 6px;
    margin-right: 15px;
}
.product-info h3 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 700;
}
.product-info p {
    margin: 4px 0 8px 0;
    color: var(--text-secondary);
    font-size: 0.9rem;
}
.ratings {
    font-size: 0.9rem;
}
.ratings .fa-star, .ratings .fa-star-half-alt {
    color: #F59E0B;
}
.ratings span {
    margin-left: 8px;
    color: var(--text-secondary);
}

/* --- Right Column --- */

/* Order Summary Card */
.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 16px;
    font-size: 1rem;
}
.summary-item span:first-child {
    color: var(--text-secondary);
}
.summary-item span:last-child {
    font-weight: 600;
}
.summary-item .discount {
    color: var(--accent-red);
    font-weight: 700;
}
.summary-item .saved {
    background-color: #D1FAE5;
    color: #065F46;
    font-size: 0.75rem;
    padding: 3px 8px;
    border-radius: 12px;
    font-weight: 700;
    margin-left: 5px;
}
.order-summary hr {
    border: none;
    border-top: 1px solid var(--card-border-color);
    margin: 10px 0 20px 0;
}
.summary-item.total {
    font-size: 1.2rem;
    font-weight: 800;
}
.summary-item.total span {
    color: var(--text-primary);
}
.place-order-btn {
    margin-top: 10px;
}
.secure-info {
    text-align: center;
    color: var(--text-secondary);
    font-size: 0.85rem;
    margin-top: 15px;
}
.secure-info i {
    color: var(--accent-green);
}

/* Delivery Information Card */
.delivery-info .info-item {
    display: flex;
    justify-content: space-between;
    font-size: 0.95rem;
}
.delivery-info .info-item:not(:last-child){
    margin-bottom: 12px;
}
.delivery-info .info-item span:first-child {
    color: var(--text-secondary);
}
.delivery-info .info-item span:last-child {
    font-weight: 600;
}

/* Responsive Design */
@media (max-width: 992px) {
    body { padding: 15px; }
    .container {
        grid-template-columns: 1fr; /* Stack columns */
    }
}
</style>
<body>
<?php if ($product_found): ?>
    <div class="container">
        <div class="left-column">
            <div class="card shipping-address-placeholder">
                <div class="card-header">
				<?php if ($has_address): ?>
                    <h2><i class="fa-solid fa-location-dot"></i> Shipping Address</h2>
                </div>
                <div class="card-body">
                    <div class="icon-placeholder">
                        <i class="fa-solid fa-map-marker-alt"></i>
                    </div>
                    <?php
                                    echo "House No. " . htmlspecialchars($address['house_no']) . ", " . "<br>";
                                    echo htmlspecialchars($address['city']) . ", " . htmlspecialchars($address['state']) . " - " . htmlspecialchars($address['pincode']);
                                    if (!empty($address['brief_add'])) {
                                        echo "<br>" . htmlspecialchars($address['brief_add']);
                                    }
                                ?>
                    
					 <?php else: ?>
                        <div class="empty-state">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3>No Address Found</h3>
                            <p>Please add a shipping address to continue with your order.</p>
                            <a href="profile.php" class="btn btn-primary" style="width: auto; padding: 10px 20px; margin-top: 15px;">
                                <i class="fas fa-plus"></i> Add Address
                            </a>
                        </div>
                        <?php endif; ?>
                </div>
            </div>

            <div class="card order-details">
                <div class="card-header">
                    <h2><i class="fa-solid fa-box-open"></i> Order Details</h2>
                </div>
                <div class="product-item">
                    <img src="../Bike-showroom/mimg/<?PHP echo htmlspecialchars($product['file'])?>" class="product-Image">
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($product['aname']); ?></h3>
                        <h3>&#x20B9;<?php echo htmlspecialchars($product['price']); ?></h3>
                        <p>tccccccx</p>
                        <div class="ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-alt"></i>
                            <span>(9,552 ratings)</span>
							<p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-column">
            <div class="card order-summary">
                <div class="card-header">
                    <h2><i class="fa-solid fa-file-invoice-dollar"></i> Order Summary</h2>
                </div>
                <div class="summary-item">
                    <span>Subtotal </span>
                    <span>₹<?php echo number_format(floatval(preg_replace('/[^\d.]/', '', $product['price'])), 2);
 ?></span>
                </div>
                <div class="summary-item">
                    <span>Discount</span>
                    <span class="discount">-₹170</span>
                </div>
                <div class="summary-item">
                    <span>Delivery Charges</span>
                    <span>FREE <span class="saved">SAVED ₹49</span></span>
                </div>
                <hr>
                <div class="summary-item total">
                    <span>Total Amount</span>
                    <span>₹<?echo number_format(floatval(preg_replace('/[^\d.]/', '', $product['price'])), 2);
; ?></span>
                </div>
                <button class="btn btn-primary place-order-btn">
                    <i class="fa-solid fa-lock"></i> Place Order
                </button>
                <p class="secure-info">
                    <i class="fa-solid fa-shield-halved"></i> Your payment information is secure.
                </p>
            </div>

            <div class="card delivery-info">
                <div class="card-header">
                     <h2><i class="fa-solid fa-truck-fast"></i> Delivery Information</h2>
                </div>
                <div class="info-item">
                    <span>Estimated Delivery</span>
                    <span>2-3 business days</span>
                </div>
                <div class="info-item">
                    <span>Shipping Method</span>
                    <span>Standard Delivery</span>
                </div>
                <div class="info-item">
                    <span>Return Policy</span>
                    <span>30 days returnable</span>
                </div>
            </div>
        </div>
		 <?php else: ?>
        <div class="checkout-card" style="text-align: center; padding: 50px 20px;">
            <i class="fas fa-exclamation-triangle" style="font-size: 64px; color: var(--danger); margin-bottom: 20px;"></i>
            <h2 style="margin-bottom: 15px;">Product Not Found</h2>
            <p style="color: var(--gray); margin-bottom: 25px;">The product you are looking for does not exist or is unavailable.</p>
            <a href="index.php" class="btn btn-primary" style="width: auto; display: inline-flex; padding: 12px 24px;">
                <i class="fas fa-home"></i> Go to Homepage
            </a>
        </div>
        <?php endif; ?>
    </div>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Payment method selection
            const paymentMethods = document.querySelectorAll('.payment-method');
            paymentMethods.forEach(method => {
                method.addEventListener('click', function() {
                    paymentMethods.forEach(m => m.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
            
            // Quantity selector
            const quantityValue = document.getElementById('quantity');
            const decreaseBtn = document.getElementById('decrease-qty');
            const increaseBtn = document.getElementById('increase-qty');
            
            let quantity = 1;
            const productPrice = <?php echo $product_found ? $product['price'] : 0; ?>;
            const productMrp = <?php echo $product_found ? $mrp : 0; ?>;
            const productSavings = <?php echo $product_found ? $savings : 0; ?>;
            
            function updateOrderSummary() {
                const subtotal = productPrice * quantity;
                const discount = productSavings * quantity;
                const total = subtotal;
                
                document.getElementById('subtotal').textContent = `₹${subtotal.toLocaleString()}`;
                document.getElementById('discount').textContent = `${discount.toLocaleString()}`;
                document.getElementById('total').textContent = `₹${total.toLocaleString()}`;
                
                // Update quantity display in product section
                document.querySelector('.summary-item:first-child span:first-child').textContent = `Subtotal (${quantity} item${quantity > 1 ? 's' : ''})`;
            }
            
            decreaseBtn.addEventListener('click', function() {
                if (quantity > 1) {
                    quantity--;
                    quantityValue.textContent = quantity;
                    updateOrderSummary();
                }
            });
            
            increaseBtn.addEventListener('click', function() {
                if (quantity < 10) {
                    quantity++;
                    quantityValue.textContent = quantity;
                    updateOrderSummary();
                }
            });
            
            // Place order button
            const placeOrderBtn = document.getElementById('place-order-btn');
            if (placeOrderBtn) {
                placeOrderBtn.addEventListener('click', function() {
                    const selectedMethod = document.querySelector('.payment-method.selected').getAttribute('data-method');
                    
                    if (selectedMethod === 'cod') {
                        if (confirm('Are you sure you want to place this order with Cash on Delivery?')) {
                            window.location.href = `order_now.php?a_id=<?php echo $aid; ?>&u_id=<?php echo $uid; ?>&payment_mode=cod&quantity=${quantity}`;
                        }
                    } else if (selectedMethod === 'card') {
                        if (confirm('Confirm payment of ₹' + (productPrice * quantity).toLocaleString() + '?')) {
                            // In a real application, you would process card payment here
                            alert('Card payment processing would happen here');
                        }
                    } else {
                        alert('UPI payment selected. This would redirect to UPI payment gateway.');
                    }
                });
            }
            
            // Animate step progress
            setTimeout(() => {
                const stepIndicator = document.querySelector('.step-indicator');
                if (stepIndicator) {
                    const afterElement = stepIndicator.querySelector('::after') || 
                                        document.createElement('style');
                    if (afterElement.tagName === 'STYLE') {
                        afterElement.textContent = '.step-indicator::after { width: 66%; }';
                        document.head.appendChild(afterElement);
                    }
                }
            }, 500);
        });
		</script>
</body>
</html>