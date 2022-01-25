    **Steps of creating a Package/Module/Extension in Bagisto**
Run *php artisan package:make VendorName/PackageName.*

 1. Add a composer.json to src folder with following info

```{
   "name": "vendorname/packagename",
   "description": "This will add data to the database through form",
   "type": "library",
   "license": "MIT",
   "authors": [
       {
           "name": "username",
           "email": "email"
       }
   ],
   "minimum-stability": "dev",
   "require": {},
   "autoload": {
       "psr-4": {
           "VendorName\\PackageName\\": "src/"
       }
   }
}
```

 2. Add your providers class link to config/app.php providers array.
    Example:

    *Mrshiam\Blog\Providers\blogServiceProvider::class,*

 3. Add your package link to composer.json of the main file into
    "autoload" "psr-4" named array

*Example: Mrshiam\Blog\Providers\blogServiceProvider::class,*

 4. Run composer-dump-autoload.

 5. Run php artisan optimize.

 6. Create a Model in Bagisto Package

    *php artisan package:make-model ModelName vendorname/packagename*

 7. Create a Migration in Bagisto Package

    *php artisan package:make-migration create_tablename_table vendorname/packagename*

 8. After adding required table fields just run

    *php artisan migrate*
