<h2>Create a stylist</h2>

<?php echo validation_errors();?>

<?php echo form_open('stylists/create')?>

    <label for="fname">First Name</label>
    <input type="input" name="fname" /><br />
    <label for="lname">Last Name</label>
    <input type="input" name="lname" /><br />
    
    <input type="submit" name="submit" value="Create a stylist" />
</form>