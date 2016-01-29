<html>
<body>
<h3 style="text-align: center;" >Imagens</h3>
    <form>
        <?php echo form_open_multipart('crud/');?>

        <input type="file" name="userfile" size="20" />
        <br /><br />
        <input type="submit" value="upload" />
    </form>
</body>
</html>

