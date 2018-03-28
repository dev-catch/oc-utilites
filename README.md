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

---
### Unlock Backend User

**Description**: Unlock a Backend User's account that has been suspended (due to exceeding the allowed number of failed login attempts)

**command**: `$ php artisan user:unlock`

**arguments**:
 - email: *Required*. The email address of the User to unlock
 
**usage example**:

`$ php artisan user:unlock info@aspendigital.com`

> **NOTE**: This command will also allow you to optionally reset/change the User's password after unlocking the account

---
### Clear Log File

**Description**: Clear the contents of the `system.log` file

**command**: `$ php artisan log:clear`
 
