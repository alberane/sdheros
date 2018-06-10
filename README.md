# SD-Heros (beta)

Ferramenta de análise sobre desbalanceamento de responsabilidades em projetos de software


(...)

## Instalação

1. `git clone git@github.com:alberane/sdheros.git`
2. `composer install`
3. `php -S localhost:8000 -t public public/index.php`
4. No navegador... <http://localhost:8000>

## Usando Apache
Arquivo `/etc/apache2/sites-enable/sdheros.conf`
 
```apacheconfig
<VirtualHost *:80>
	DocumentRoot /var/www/FOLDER/public/
	
	ServerName local.sdheros
	
    <Directory "/var/www/FOLDER/public">
        Options -MultiViews
        
        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^ /index.php [L]
        
        AllowOverride All
        Order allow,deny 
        Allow from all
    </Directory>
</VirtualHost>
```
Reinicie o Apache

- `sudo systemctl restart apache2`