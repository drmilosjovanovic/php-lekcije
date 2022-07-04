<div class="content">
    <h1>Najnoviji oglasi</h1>
    <?php
    foreach($ads as $ad) {
    ?>
    <div class="ad">
        <div class="ad-content">
            <div class="ad-photo">
                <a href="index.php?page=single-ad&id=<?php echo $ad['id']?>">
                <?php
                if(empty($ad['fileName'])) {
                ?>
                    <img src="public/img/camera.png"/>
                <?php
                } else {
                ?>
                    <img src="upload/<?php echo $ad['fileName']?>"/>
                <?php
                } 
                ?>
                </a>
            </div>
            <div class="ad-text">
                <a href="index.php?page=single-ad&id=<?php echo $ad['id']?>">                
                    <?php echo $ad['description']?>
                </a>
            </div>
        </div>
        <div class="ad-phone">
                <a href="index.php?page=single-ad&id=<?php echo $ad['id']?>">       
                    <?php echo $ad['phone_number']?></div>        
                </a>
        </div>
    <?php
    }
    ?>
</div>
