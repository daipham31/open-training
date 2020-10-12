# open-training
This first commit contains HelloWorld module, regitry, session and cookie example. Also some test function and test Factories of Magento2.

1. Best environment for development is "developer"
Command:
bin/magento deploy:mode:show - Show current mode.
bin/magento deploy:mode:set developer -Enable developer mode. 
List of mode: product,developer,default.
2. 
Magento has 3 types of module.
- module
- theme
- language
We gonna talk about type 1:
- registration.php - module register. Declare module's name.
- etc - includes xml files. Ex: module.xml(declare module), acl.xml (backend menu), config.xml (defautl value), routes.xml (module URL), di.xml(dependency injection) etc.
- API - Declare data interface and service interface. Data interface will be used for model if available
- Block - Render parts of each page, call model to get data and render to template. Blocks normally are loaded by layout XML.
- Controller - Includes Router implementation files
- Helper - Includes utility classes
- i18n - Language package. Used for translation.
- Model - Includes PHP model classes as part of module logic MVC vertical implementation.
- Setup - Includes classes for module database structure and data setup. These data are invoked when installing or upgrading.
- Observer - Includes files for executing commands which are from the listener.
- View - Includes view files, containing static view files, email templates, design templates, and layout files.
- Plugin - Includes any needed plug-ins.
- Cron - Includes cron job definitions.
- CustomerData - Includes section files.
3. Pass variable to template via layout:
- action
- argument
4. List of methods used in layout actions.
- Public methods of block (or it's parent blocks)
- Using magick getter and setters of Magento Object
5. Extending means create a layout file and just add your changes, Overriding need whole code to be present in the layout.
Not sure when we can't extend layout.
6. 
7. Page is blank or have fatal error, check var/error
8. Magento error message, check var/log and var/report
9. 
10. We can't var_dump() or print_r() because both of them try to print the object and this object has a lot of objects attached to it because of the dependency injection.
- Solution: Xdebug or inject to construct and getData();
11. DI check the code.

12. Test Packagist :))) 

    composer require daipham31/module-helloworld