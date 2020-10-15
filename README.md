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


PART 4:

0. Query all products name:
SELECT value FROM   `catalog_product_entity_varchar` WHERE  `attribute_id` = 73;

    Query all products name for English Store:
SELECT value FROM   catalog_product_entity_varchar WHERE  attribute_id = (SELECT attribute_id FROM   eav_attribute WHERE  entity_type_id = 4 AND attribute_code LIKE 'name') AND  store_id = (SELECT store_id FROM   store WHERE  store.name LIKE 'English');
    Query all customer name and customer email:
SELECT
customer_entity.fisrtname,
customer_entity.middlename,
customer_entity.lastname,
customer_address_entity_text.value
FROM customer_entity
JOIN customer_address_entity ON customer_entity.entity_id = 
customer_address_entity.parent_id
JOIN customer_address_entity_text ON customer_address_entity.entity_id = 
customer_address_entity_text.entity_id;

1. Layout located in presentation layer.
Magento app processes layout files in the following order:
    - Module base files loaded.
    - Module area files loaded.
    - Collects all layout files from modules. The order is determined by the modules order in the module list from the app/etc/config.php file. (If their        priorities are equal, they are sorted according to their alphabetical priority.)
    - Determines the sequence of inherited themes [<parent_theme>, ..., <parent1_theme>] <current_theme>
    - Iterates the sequence of themes from last ancestor to current:
        a. Adds all extending theme layout files to the list.
        b. Replaces overridden layout files in the list.
    - Merges all layout files from the list.

2. All controllers are extending \Magento\Framework\App\Action\Action class which has dispatch method which will call execute method in controller. Controllers are structured in a specific way so they can be matched.

3. Url structure:
    www.mage.com/frontName/action path/action class/

    - frontName – it’s set in routes.xml configuration, and has unique value which will be matched by router
    - action path – folder name inside Controller folder, default is index
    - action class – our action class which we call Controller, default is index
dispatch(): This method will be called first by Front Controller (Magento\Framework\App\FrontController)
Forward method: This protected method will transfer control to another action controller, controller path and module. 
Redirect method: It will redirect user on new Url by setting response headers and redirect url.


Controller action match flow:
FrontController::dispatch() → Router::match() → Controller::dispatch() -> Controller::execute()
4. 

5. Magento accumulates data into special tables using indexers.

    Indexing types:
    Full reindex, which means rebuilding all the indexing-related database tables
    Full reindexing can be caused by a variety of things, including creating a new web store or new customer group.

    Partial reindex, which means rebuilding the database tables only for the things that changed (like changing a single product attribute or price)




