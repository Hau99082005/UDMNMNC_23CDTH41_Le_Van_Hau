<?php
/**
 * Template Name: Homepage
 *
 * @package dulichvietnhat
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Khám phá Nhật Bản - Điều kỳ diệu phương Đông</h1>
            <p>Trải nghiệm hành trình đáng nhớ cùng những điểm đến tuyệt vời nhất Nhật Bản</p>
            <div class="hero-buttons">
                <a href="#tours" class="btn btn-primary">Xem Tour Ngay</a>
                <a href="#contact" class="btn btn-outline">Liên Hệ Tư Vấn</a>
            </div>
        </div>
    </div>
    
    <!-- Search Form -->
    <div class="container">
        <form class="tour-search-form">
            <h3>Tìm kiếm tour</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="destination">Điểm đến</label>
                    <select id="destination" class="form-control">
                        <option value="">Chọn điểm đến</option>
                        <option value="tokyo">Tokyo</option>
                        <option value="osaka">Osaka</option>
                        <option value="kyoto">Kyoto</option>
                        <option value="hokkaido">Hokkaido</option>
                        <option value="nagoya">Nagoya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="duration">Thời gian</label>
                    <select id="duration" class="form-control">
                        <option value="">Chọn thời gian</option>
                        <option value="3-5">3-5 ngày</option>
                        <option value="6-8">6-8 ngày</option>
                        <option value="9-12">9-12 ngày</option>
                        <option value="13+">Trên 12 ngày</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="month">Tháng khởi hành</label>
                    <select id="month" class="form-control">
                        <option value="">Chọn tháng</option>
                        <option value="1">Tháng 1</option>
                        <option value="2">Tháng 2</option>
                        <option value="3">Tháng 3</option>
                        <option value="4">Tháng 4</option>
                        <option value="5">Tháng 5</option>
                        <option value="6">Tháng 6</option>
                        <option value="7">Tháng 7</option>
                        <option value="8">Tháng 8</option>
                        <option value="9">Tháng 9</option>
                        <option value="10">Tháng 10</option>
                        <option value="11">Tháng 11</option>
                        <option value="12">Tháng 12</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Featured Tours Section -->
<section id="tours" class="section-padding">
    <div class="container">
        <div class="section-title">
            <h2>Tour Nổi Bật</h2>
            <p>Những hành trình được yêu thích nhất</p>
        </div>
        
        <div class="tour-grid">
            <!-- Tour Item 1 -->
            <div class="tour-card">
                <div class="tour-badge">Giảm 10%</div>
                <div class="tour-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tokyo-tour.jpg" alt="Tour Tokyo">
                    <div class="tour-duration">5N4Đ</div>
                </div>
                <div class="tour-info">
                    <div class="tour-category">Nhật Bản</div>
                    <h3 class="tour-title">Tokyo - Núi Phú Sĩ - Công Viên Cáo</h3>
                    <div class="tour-meta">
                        <span><i class="far fa-calendar-alt"></i> Khởi hành: Hàng tuần</span>
                        <span class="tour-price">41.900.000đ</span>
                    </div>
                    <div class="tour-excerpt">
                        <p>Khám phá thủ đô Tokyo sôi động, ngắm núi Phú Sĩ hùng vĩ và trải nghiệm công viên cáo độc đáo.</p>
                    </div>
                    <div class="tour-footer">
                        <a href="#" class="btn btn-outline">Xem chi tiết</a>
                        <a href="#" class="btn btn-primary">Đặt ngay</a>
                    </div>
                </div>
            </div>
            
            <!-- Tour Item 2 -->
            <div class="tour-card">
                <div class="tour-badge">Bán chạy</div>
                <div class="tour-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/kyoto-tour.jpg" alt="Tour Kyoto">
                    <div class="tour-duration">7N6Đ</div>
                </div>
                <div class="tour-info">
                    <div class="tour-category">Nhật Bản</div>
                    <h3 class="tour-title">Kyoto - Osaka - Nara - Kobe</h3>
                    <div class="tour-meta">
                        <span><i class="far fa-calendar-alt"></i> Khởi hành: 15, 25 hàng tháng</span>
                        <span class="tour-price">39.900.000đ</span>
                    </div>
                    <div class="tour-excerpt">
                        <p>Hành trình khám phá văn hóa truyền thống Nhật Bản qua các thành phố cổ kính và ẩm thực đặc sắc.</p>
                    </div>
                    <div class="tour-footer">
                        <a href="#" class="btn btn-outline">Xem chi tiết</a>
                        <a href="#" class="btn btn-primary">Đặt ngay</a>
                    </div>
                </div>
            </div>
            
            <!-- Tour Item 3 -->
            <div class="tour-card">
                <div class="tour-badge">Mới</div>
                <div class="tour-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hokkaido-tour.jpg" alt="Tour Hokkaido">
                    <div class="tour-duration">6N5Đ</div>
                </div>
                <div class="tour-info">
                    <div class="tour-category">Nhật Bản</div>
                    <h3 class="tour-title">Hokkaido Mùa Hoa Lavender</h3>
                    <div class="tour-meta">
                        <span><i class="far fa-calendar-alt"></i> Khởi hành: Tháng 7-8</span>
                        <span class="tour-price">33.900.000đ</span>
                    </div>
                    <div class="tour-excerpt">
                        <p>Ngắm hoa lavender nở rộ tại các cánh đồng bất tận ở Furano và Biei, thưởng thức hải sản tươi ngon.</p>
                    </div>
                    <div class="tour-footer">
                        <a href="#" class="btn btn-outline">Xem chi tiết</a>
                        <a href="#" class="btn btn-primary">Đặt ngay</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="#" class="btn btn-primary btn-lg">Xem Tất Cả Tour</a>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us section-padding bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Tại Sao Chọn Chúng Tôi</h2>
            <p>Những lý do bạn nên đặt tour du lịch Nhật Bản tại chúng tôi</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>An Toàn Tuyệt Đối</h3>
                <p>Đảm bảo an toàn cho quý khách trong suốt hành trình với dịch vụ chăm sóc 24/7.</p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-tag"></i>
                </div>
                <h3>Giá Tốt Nhất</h3>
                <p>Cam kết giá tốt nhất thị trường với chất lượng dịch vụ hoàn hảo.</p>
            </div>
            
            <div class="feature-item">n                    <i class="fas fa-utensils"></i>
                </div>
                <h3>Ẩm Thực Đa Dạng</h3>
                <p>Thưởng thức ẩm thực đa dạng, phong phú và đặc trưng của từng vùng miền.</p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Hỗ Trợ 24/7</h3>
                <p>Đội ngũ tư vấn viên luôn sẵn sàng hỗ trợ quý khách mọi lúc, mọi nơi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Popular Destinations -->
<section class="popular-destinations section-padding">
    <div class="container">
        <div class="section-title">
            <h2>Điểm Đến Phổ Biến</h2>
            <p>Khám phá những điểm đến hấp dẫn nhất Nhật Bản</p>
        </div>
        
        <div class="destinations-grid">
            <div class="destination-card" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tokyo-dest.jpg')">
                <div class="destination-overlay">
                    <h3>Tokyo</h3>
                    <a href="#" class="btn btn-outline">Khám phá</a>
                </div>
            </div>
            
            <div class="destination-card" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/kyoto-dest.jpg')">
                <div class="destination-overlay">
                    <h3>Kyoto</h3>
                    <a href="#" class="btn btn-outline">Khám phá</a>
                </div>
            </div>
            
            <div class="destination-card" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/osaka-dest.jpg')">
                <div class="destination-overlay">
                    <h3>Osaka</h3>
                    <a href="#" class="btn btn-outline">Khám phá</a>
                </div>
            </div>
            
            <div class="destination-card" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hokkaido-dest.jpg')">
                <div class="destination-overlay">
                    <h3>Hokkaido</h3>
                    <a href="#" class="btn btn-outline">Khám phá</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials section-padding bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Cảm Nhận Khách Hàng</h2>
            <p>Những đánh giá chân thực từ khách hàng đã trải nghiệm</p>
        </div>
        
        <div class="testimonials-slider">
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"Chuyến đi Nhật Bản thật tuyệt vời! Dịch vụ của công ty rất chuyên nghiệp, hướng dẫn viên nhiệt tình, chu đáo. Tôi sẽ quay lại vào mùa hoa anh đào."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar1.jpg" alt="Khách hàng">
                    </div>
                    <div class="author-info">
                        <h4>Chị Ngọc Anh</h4>
                        <span>Hà Nội</span>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>"Tour rất tốt, đúng lịch trình, khách sạn sạch sẽ, đồ ăn ngon. Đặc biệt là hướng dẫn viên rất am hiểu về văn hóa Nhật Bản."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar2.jpg" alt="Khách hàng">
                    </div>
                    <div class="author-info">
                        <h4>Anh Minh Đức</h4>
                        <span>TP.HCM</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/cta-bg.jpg')">
    <div class="container">
        <div class="cta-content">
            <h2>Bạn Đã Sẵn Sàng Cho Chuyến Đi Nhật Bản?</h2>
            <p>Đăng ký ngay hôm nay để nhận ưu đãi đặc biệt lên đến 5.000.000đ</p>
            <a href="#" class="btn btn-primary btn-lg">Đặt Tour Ngay</a>
        </div>
    </div>
</section>

<!-- Latest News -->
<section class="latest-news section-padding">
    <div class="container">
        <div class="section-title">
            <h2>Tin Tức & Sự Kiện</h2>
            <p>Cập nhật thông tin mới nhất về du lịch Nhật Bản</p>
        </div>
        
        <div class="news-grid">
            <div class="news-card">
                <div class="news-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news1.jpg" alt="Tin tức">
                    <div class="news-date">
                        <span class="day">15</span>
                        <span class="month">Th6</span>
                    </div>
                </div>
                <div class="news-content">
                    <div class="news-category">Kinh Nghiệm Du Lịch</div>
                    <h3><a href="#">Kinh nghiệm du lịch Nhật Bản mùa thu lá đỏ</a></h3>
                    <p>Nhật Bản mùa thu với những rừng cây phong đỏ rực, thời tiết mát mẻ là thời điểm lý tưởng để khám phá đất nước mặt trời mọc.</p>
                    <a href="#" class="read-more">Đọc thêm <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            
            <div class="news-card">
                <div class="news-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news2.jpg" alt="Tin tức">
                    <div class="news-date">
                        <span class="day">02</span>
                        <span class="month">Th7</span>
                    </div>
                </div>
                <div class="news-content">
                    <div class="news-category">Ẩm Thực</div>
                    <h3><a href="#">Top 10 món ăn đường phố Nhật Bản nên thử</a></h3>
                    <p>Khám phá 10 món ăn đường phố hấp dẫn nhất Nhật Bản mà bạn không thể bỏ qua khi đặt chân đến xứ sở hoa anh đào.</p>
                    <a href="#" class="read-more">Đọc thêm <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            
            <div class="news-card">
                <div class="news-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news3.jpg" alt="Tin tức">
                    <div class="news-date">
                        <span class="day">20</span>
                        <span class="month">Th7</span>
                    </div>
                </div>
                <div class="news-content">
                    <div class="news-category">Khuyến Mãi</div>
                    <h3><a href="#">Ưu đãi đặc biệt tour mùa hè 2023</a></h3>
                    <p>Nhận ngay ưu đãi lên đến 5.000.000đ khi đặt tour Nhật Bản mùa hè 2023. Áp dụng cho khách hàng đăng ký trước ngày 30/7.</p>
                    <a href="#" class="read-more">Đọc thêm <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="#" class="btn btn-outline">Xem Tất Cả Tin Tức</a>
        </div>
    </div>
</section>

<!-- Partners -->
<div class="partners section-padding bg-light">
    <div class="container">
        <div class="partners-slider">
            <div class="partner-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner1.png" alt="Đối tác">
            </div>
            <div class="partner-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner2.png" alt="Đối tác">
            </div>
            <div class="partner-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner3.png" alt="Đối tác">
            </div>
            <div class="partner-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner4.png" alt="Đối tác">
            </div>
            <div class="partner-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner5.png" alt="Đối tác">
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
