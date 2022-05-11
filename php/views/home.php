<h1>Home</h1>
<?php if(\app\core\Application::isGuest()): ?>
<h3>Welcome Guest</h3>
<?php else: ?>
<h3>Welcome <?php echo \app\core\Application::$app->user->getDisplayName() ?></h3>
<?php endif; ?>