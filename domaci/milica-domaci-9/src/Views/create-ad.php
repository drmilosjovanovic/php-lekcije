<div class="content">
    
    <form action="index.php?page=create-ad" method="POST">
        Phone number:<br />
        <input type="text" name="phoneNumber" placeholder="Enter your phone number"/><br />  
        Description:<br />
        <textarea name="description" placeholder="Enter your ad content" class="new-ad"></textarea>

        <div class="error"><?php echo $errors;?></div>
        <input type="submit" value="Submit"/><br /><br />
    </form>

</div>
