echo "doing tests... goodluck."
mkdir php-codesniffer && curl -L https://github.com/squizlabs/PHP_CodeSniffer/archive/2.9.tar.gz | tar xz --strip-components=1 -C php-codesniffer
mkdir wordpress-coding-standards && curl -L https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/archive/master.tar.gz | tar xz --strip-components=1 -C wordpress-coding-standards
cd php-codesniffer
scripts/phpcs --config-set installed_paths ../wordpress-coding-standards
cd ..
./php-codesniffer/scripts/phpcs --ignore=*/hybrid/*,*/total/*,*/twentyeleven/*,*/twentyfifteen/*,*/twentyfourteen/*,*/twentyseventeen/*,*/twentysixteen/*,*/twentyten/*,*/twentythirteen/*,*/twentytwelve/* --standard=WordPress ./wp-content/themes/**/*.php
