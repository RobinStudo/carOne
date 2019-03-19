<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Exploit</title>
    </head>
    <body>

        <?php if( !empty( $_POST['message'] ) ){ ?>
            <div class="">
                <?php echo $_POST['message']; ?>
            </div>
        <?php } ?>

        <form method="post">
            <textarea name="message"></textarea>
            <input type="submit" value="Envoyer" />
        </form>

    </body>
</html>
