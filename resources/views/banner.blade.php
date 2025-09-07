        <!-- banner-section -->
        <section class="banner-section centred">
            <img src={{ asset('images/background/red-megaphone-with-word-exclamation-top-keyboard_1315312-74570.jpg')}} alt="Banner" class="banner-image"/>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 content-column">
                        <div class="content-box">
                            <h1>Buy, Sell, Rent & Exchange <br />in one Click</h1>
                            <!-- Bouton filtre pour mobile -->
                                <div class="d-lg-none mb-3">
                                <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#mobileFilterForm" aria-expanded="false" aria-controls="mobileFilterForm">
                                    Filter
                                </button>
                                </div>

                                <!-- Formulaire -->
                                <div class="collapse d-lg-block" id="mobileFilterForm">
                                <div class="form-inner">
                                    <form action="#" method="post">
                                    <div class="input-inner clearfix d-flex flex-wrap gap-3 align-items-end">

                                        <!-- Search Keyword -->
                                        <div class="form-group flex-grow-1">
                                        <i class="icon-2"></i>
                                        <input type="search" name="name" placeholder="Search Keyword..." required>
                                        </div>

                                        <!-- Location -->
                                        <div class="form-group">
                                        <i class="icon-3"></i>
                                        <select class="wide">
                                            <option data-display="Select Location">Select Location</option>
                                            <option value="1">California</option>
                                            <option value="2">New York</option>
                                            <option value="3">San Francisco</option>
                                            <option value="4">Chicago</option>
                                            <option value="5">All</option>
                                        </select>
                                        </div>

                                        <!-- Category -->
                                        <div class="form-group">
                                        <i class="icon-4"></i>
                                        <select class="wide">
                                            <option data-display="Select Category">Select Category</option>
                                            <option value="1">Education</option>
                                            <option value="2">Restaurant</option>
                                            <option value="3">Real Estate</option>
                                            <option value="4">Home Appliances</option>
                                        </select>
                                        </div>

                                        <!-- Condition -->
                                        <div class="form-group">
                                        <select class="wide condition-select">
                                            <option value="">Select Condition</option>
                                            <option value="new">New</option>
                                            <option value="used">Used</option>
                                        </select>
                                        </div>

                                        <!-- Price Range -->
                                        <div class="form-group price-range-group">
                                        <label for="priceRange">Price Range:</label>
                                        <input type="range" id="priceRange" name="price" min="0" max="1000" step="10" value="500">
                                        <span id="priceValue">$500</span>
                                        </div>

                                        <!-- Search Button -->
                                        <div class="btn-box">
                                        <button type="submit"><i class="icon-2"></i> Search</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                </div>

                                <!-- Script pour mettre à jour la valeur du range -->
                                <script>
                                const priceRange = document.getElementById('priceRange');
                                const priceValue = document.getElementById('priceValue');

                                priceRange.addEventListener('input', function() {
                                priceValue.textContent = '$' + this.value;
                                });
                                </script>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section end -->





