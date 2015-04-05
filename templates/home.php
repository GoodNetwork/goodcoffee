<div id="content" class="site-content">
    <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/10/main-bg-top_mini-1.jpg);" class="homepage-cover page-cover entry-cover has-image">
        <div class="cover-wrapper container">
            <div class="listify_widget_search_listings">
                <hgroup class="home-widget-section-title">
                    <h1 class="home-widget-title">Be the Connoisseur</h1>
                    <h2 class="home-widget-description">Still in search of the perfect bean?</h2>
                </hgroup>
            </div>
            <form class="form-inline home-filter__form">
            	<div class="form-group">
                    <label class="sr-only" for="keyword">Keyword</label>
                    <input type="text" class="form-control home-filter__input" id="keyword" placeholder="Keyword">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="location">Location</label>
                    <input type="text" class="form-control home-filter__input" id="location" placeholder="Location">
                </div>
                <button class="btn btn-default btn-success">Search</button>
            </form>
        </div>
    </div>
    <div class="container">
        <aside class="home-widget">
            <hgroup class="home-widget-section-title">
                <h2 class="home-widget-title">Recent Venues</h2>
                <h2 class="home-widget-description">Discover some of the best coffee shops</h2>
            </hgroup>
            <ul class="job_listings">
                <?php foreach ($venues as $venue) { ?>
                <li class="type-job_listing col-xs-12 col-sm-6 col-md-4 style-grid">
                    <div class="content-box">
                        <a href="/venue/<?php echo $venue->getObjectId() ?>/" class="job_listing-clickbox"></a>
                        <header style="background-image: url(<?php echo $venue->photo ?>);" class="job_listing-entry-header listing-cover has-image">
                            <div class="job_listing-entry-header-wrapper cover-wrapper">
                                <div class="job_listing-entry-thumbnail">
                                    <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/Stocksy_txp782c31421CE000_Medium_85879-1024x682.jpg);" class="list-cover has-image"></div>
                                </div>
                                <div class="job_listing-entry-meta">
                                    <h1 itemprop="name" class="job_listing-title"><?php echo $venue->name ?></h1>
                                    <div class="job_listing-location job_listing-location-formatted" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                                        <a class="google_map_link" href="http://maps.google.com/maps?q=<?php echo $venue->lat ?>%2C<?php echo $venue->lng ?>" target="_blank">
                                            <?php echo $venue->street_address ?>
                                            <br>
                                            <?php echo $venue->city . ' ' . $venue->zip ?></a>
                                    </div>
                                    <div class="job_listing-phone">
                                        <span itemprop="telephone"><a href="#"><?php echo $venue->phone ?></a></span>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <!-- .entry-header -->
                        <footer class="job_listing-entry-footer">
                        </footer>
                        <!-- .entry-footer -->
                    </div>
                </li>
                <?php }?>
            </ul>
        </aside>
    </div>
</div>
<!-- #content -->
