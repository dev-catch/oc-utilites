# Aspen Digital Utilities

## Artisan Commands

### Create Migration

**Description**: Scaffolds a migration file for the specified plugin

**command**: `$ php artisan create:migration`

**arguments**:
 - plugin: *Required*. The plugin identifier, *Eg: AuthorName.PluginName*
 - name: *Required*. The name of the migration, *Eg: add_email_to_users*
 
**usage example**:

`$ php artisan create:migration AspenDigital.Ecommerce add_tracking_number_to_orders`
 
