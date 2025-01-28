<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié - TechHorizons</title>
   <link rel="stylesheet" href="{{asset('css/loginLogout/forgetPass.css')}}">
</head>
<body>
    <div class="container">
        <h1 class="title">Mot de passe oublié ?</h1>

        <p class="description">
            Pas de problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons un lien de réinitialisation qui vous permettra d'en choisir un nouveau.
        </p>

        <?php if(session('status')): ?>
            <div class="status-message">
                <?php echo session('status'); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo route('password.email'); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?php echo old('email'); ?>"
                    class="form-input"
                    required
                    autofocus
                >
                <?php if($errors->get('email')): ?>
                    <div class="error-message">
                        <?php echo $errors->first('email'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="button-container">
                <button type="submit" class="submit-button">
                    Envoyer le lien de réinitialisation
                </button>
            </div>
        </form>
    </div>
</body>
</html>
