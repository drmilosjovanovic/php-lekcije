<div class="content">
    
    <form action="index.php?page=create-ad" enctype="multipart/form-data" method="POST">
        Phone number:<br />
        <input type="text" name="phoneNumber" placeholder="Enter your phone number"/><br />  
        Description:<br />
        <textarea name="description" placeholder="Enter your ad content" class="new-ad"></textarea><br />
        Photo:<br />
        <input type="file" name="myFile" /><br /><br />

        <div class="error"><?php echo $errors;?></div>
        <input type="submit" value="Submit"/><br /><br />
    </form>

</div>
