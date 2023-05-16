# specification-pattern-symfony-example
Specification pattern implementation using Symfony cli 6.2 and PHP 8.2

Hardcoded specification: src/Commands/RunHardcoded.php `php bin/console run:hardcoded`

Parametrized specification: src/Commands/RunParametrized.php `php bin/console run:param`

Parametrized with context specification: src/Commands/RunParametrizedWithContext.php `php bin/console run:paramWithContext`

Composite specification: src/Commands/RunComposite.php `php bin/console run:composite {type: any|all|not|combined}` 
