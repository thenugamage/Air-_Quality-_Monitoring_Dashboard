<?php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.css">
    <title>AQI Colombo</title>
</head>
<body>
    <div class="main-container">
        <!-- Header Section with Navigation -->
        <header>
            <div class="logo">
              <h1>AQI Colombo</h1>
            </div>
            <nav>
              <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#map">Map</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="pages/contact-us.html">Contact Us</a></li>
                <li><a href="pages/login.html" class="admin-login">Admin Login</a></li>
              </ul>
            </nav>
          </header>

        <!-- Body Container with Multiple Vertical Sections -->
        <div class="body-container">
            <!-- Intro Section - Split into Two Horizontal Divisions -->
            <section id="intro">
                <div class="intro-text">
                    <h2>Welcome to Our Website</h2>
                    <p>This is the introduction text area. Here you can describe your website or business.</p>
                    <button class="cta-button" onclick="location.href='#how-it-works'">Learn More</button>
                </div>
                <div class="intro-image">
                    <img src="images/ChatGPT Image Apr 26, 2025, 03_35_32 PM.png" alt="Intro Image">
                </div>
            </section>

            <!-- Map Section -->
            <section class="aqi-map-section" id="map">
                <div class="container">
                  <h2>Colombo Air Quality Index Map</h2>
                  <p>Real-time air quality monitoring across the Colombo Metropolitan Area</p>
                  
                  <div class="map-container">
                    <div id="aqi-map"></div>
                    <div class="map-legend">
                      <h3>AQI Legend</h3>
                      <ul>
                        <li><span class="color-box good"></span> Good (0-50)</li>
                        <li><span class="color-box moderate"></span> Moderate (51-100)</li>
                        <li><span class="color-box unhealthy-sensitive"></span> Unhealthy for Sensitive Groups (101-150)</li>
                        <li><span class="color-box unhealthy"></span> Unhealthy (151-200)</li>
                        <li><span class="color-box very-unhealthy"></span> Very Unhealthy (201-300)</li>
                        <li><span class="color-box hazardous"></span> Hazardous (301+)</li>
                      </ul>
                    </div>
                  </div>
                  
                  <div class="sensor-details" id="sensor-details">
                    <h3>Sensor Details</h3>
                    <p>Click on a sensor on the map to view details</p>
                    <div id="sensor-info" class="hidden">
                      <h4 id="sensor-location">Location: --</h4>
                      <p id="sensor-aqi">Current AQI: --</p>
                      <p id="sensor-category">Category: --</p>
                      <p id="sensor-updated">Last Updated: --</p>
                      <div id="aqi-trend-chart"></div>
                    </div>
                  </div>
                </div>
            </section>

            <!-- About Section -->
            <section id="about">
                <h2>About Us</h2>

                <div class="about-section">
                    <p>The Real-time Air Quality Monitoring Dashboard for Colombo is an initiative developed in collaboration with the Colombo Municipal Council to address growing concerns about air pollution in the metropolitan area. Our platform provides comprehensive, up-to-date information on air quality across Colombo, making critical environmental data accessible to everyone.</p>
                </div>
        
                <div class="about-section">
                    <h2>Our Mission</h2>
                    <p>We believe that access to accurate air quality information is essential for public health and environmental awareness. By providing real-time Air Quality Index (AQI) readings from sensors placed strategically throughout Colombo, we aim to:</p>
                    <ul>
                        <li>Empower citizens with knowledge about the air they breathe</li>
                        <li>Support informed decision-making for daily activities</li>
                        <li>Assist environmental agencies in monitoring pollution trends</li>
                        <li>Enable researchers to analyze patterns and develop solutions</li>
                        <li>Promote awareness of environmental issues affecting our city</li>
                    </ul>
                </div>
        
                <div class="about-section" id="how-it-works">
                    <h2>How It Works</h2>
                    <p>Our dashboard collects data from a network of air quality sensors positioned across the Colombo Metropolitan Area. These sensors continuously measure pollutants such as particulate matter (PM2.5, PM10), nitrogen dioxide (NO₂), sulfur dioxide (SO₂), carbon monoxide (CO), and ozone (O₃).</p>
                    <p>The collected data is processed in real-time to calculate the Air Quality Index (AQI) - a standardized indicator developed to communicate how clean or polluted the air is, and what associated health effects might be of concern.</p>
                </div>
        
                <div class="about-section">
                    <h2>Features</h2>
                    <div class="features-grid">
                        <div class="feature-card">
                            <div class="feature-icon">🗺️</div>
                            <h3>Interactive Map View</h3>
                            <p>Visualize air quality across Colombo with color-coded markers representing current AQI levels</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">📊</div>
                            <h3>Historical Data Trends</h3>
                            <p>Explore air quality patterns over time - daily, weekly, or monthly</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">📍</div>
                            <h3>Sensor-Specific Information</h3>
                            <p>Access detailed readings from individual monitoring stations</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">🏷️</div>
                            <h3>AQI Categories</h3>
                            <p>Understand air quality through standardized categories from "Good" to "Hazardous"</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">📱</div>
                            <h3>Mobile-Friendly Design</h3>
                            <p>Access critical information on any device, anywhere</p>
                        </div>
                    </div>
                </div>
        
                <div class="about-section">
                    <h2>Understanding the AQI Scale</h2>
                    <p>Our dashboard uses the standard Air Quality Index (AQI) color-coding system:</p>
                    <div class="table-container">
                        <table class="aqi-table">
                            <thead>
                                <tr>
                                    <th>AQI Range</th>
                                    <th>Category</th>
                                    <th>Color</th>
                                    <th>Health Implications</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="aqi-good">
                                    <td>0-50</td>
                                    <td>Good</td>
                                    <td>Green</td>
                                    <td>Air quality is satisfactory, and poses little or no risk</td>
                                </tr>
                                <tr class="aqi-moderate">
                                    <td>51-100</td>
                                    <td>Moderate</td>
                                    <td>Yellow</td>
                                    <td>Air quality is acceptable; however, some pollutants may be a moderate health concern for a very small number of people</td>
                                </tr>
                                <tr class="aqi-sensitive">
                                    <td>101-150</td>
                                    <td>Unhealthy for Sensitive Groups</td>
                                    <td>Orange</td>
                                    <td>Members of sensitive groups may experience health effects</td>
                                </tr>
                                <tr class="aqi-unhealthy">
                                    <td>151-200</td>
                                    <td>Unhealthy</td>
                                    <td>Red</td>
                                    <td>Everyone may begin to experience health effects</td>
                                </tr>
                                <tr class="aqi-very-unhealthy">
                                    <td>201-300</td>
                                    <td>Very Unhealthy</td>
                                    <td>Purple</td>
                                    <td>Health alert: everyone may experience more serious health effects</td>
                                </tr>
                                <tr class="aqi-hazardous">
                                    <td>301+</td>
                                    <td>Hazardous</td>
                                    <td>Maroon</td>
                                    <td>Health warnings of emergency conditions; entire population is likely to be affected</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        
                <div class="about-section">
                    <h2>Data Sources</h2>
                    <p>Our dashboard uses [data sources or simulation methods]. The system provides valuable insights while ensuring data accuracy and reliability.</p>
                </div>
        
                <div class="about-section">
                    <h2>The Team</h2>
                    <p>This dashboard was developed by [Your Team Name/Members] as part of the PUSL2020 Software Development Tools and Practices module at NSBM Green University. Our team is committed to creating tools that make environmental data more accessible and actionable.</p>
                </div>
        
                <div class="about-section" id="contact">
                    <h2>Contact Us</h2>
                    <p>For questions, feedback, or support regarding the Air Quality Monitoring Dashboard, please contact us at [contact information].</p>
                </div>
        
            </section>
        </div>

        <!-- Footer Section -->
        <footer>
            <div class="footer-content">
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#map">Map</a></li>
                        <li><a href="pages/contact-us.html">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3>Contact Us</h3>
                    <p>Email: aqicolombo@gmail.com</p>
                    <p>Phone: (+94)70 456-7890</p>
                </div>
                <div class="footer-social">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Your Website. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

?>

