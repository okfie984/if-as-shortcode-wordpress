# Description About "IF As Shortcode"
This is plugin help you to add conditions inside any post types, menus, and widgets to restrict the content by use shortcode without use php code or other language :).

# How to install ?
### Installation Automatically
1. Click Plugins in the menu dashboard.
2. Click Add New.
3. Upload and choose "WP-Hijri.zip" file and activate directly.
4. After activated plugin you can see sub page of settings inside "Settings" menu.

### Installation Manually
1. Download the plugin to your computer.
2. Unzip the file and upload it to the "/wp-content/plugins/" by using FTP or Cpanel.
3. Activate the plugin through the "Plugins" menu in WordPress dashboard.
4. After activated plugin you can see sub page of settings inside "Settings" menu.

# How to Usage ?
### Posts/Pages/Other Post Types :
1. Create new content and in above tinymce editor you will see button it's name is "IF".
2. Click "IF" button and choose the condition you need to use inside content area.
3. You can select the true block and write otherwise inside else block.
4. Save your content and publish to see it!
 

### Menus :
1. Click in left side "Appearance"
2. Choose from it "Menus" page.
3. You must show description field for every menu by this way :
** Click "Screen Options" up the menu page.
** Chack "Description" from that tab.
4. Now you can add your restrict content from "Shortcode" tab.

### Widgets : 
1. Click in left side "Appearance"
2. Choose from it "Widgets" page.
3. Now you have box it's name "The restricted content".
4. You can move it to any sidebar and fill the felids.
 
 # List of conditions
 * [if current_user_can capability="administrator"]True content[else]False content[/if]
 * [if current_user_can capability="editor"]True content[else]False content[/if]
 * [if current_user_can capability="author"]True content[else]False content[/if]
 * [if current_user_can capability="contributor"]True content[else]False content[/if]
 * [if current_user_can capability="subscriber"]True content[else]False content[/if]
 * [if is_user_logged_in]True content[else]False content[/if]
 * [if has_post_thumbnail]True content[else]False content[/if]
 * [if comments_open]True content[else]False content[/if]
 * [if has_tag]True content[else]False content[/if]
 * [if is_attachment]True content[else]False content[/if]
 * [if has_excerpt]True content[else]False content[/if]
 * [if pings_open]True content[else]False content[/if]
 * [if is_home]True content[else]False content[/if]
 * [if is_rtl]True content[else]False content[/if]
 
 # Example
 * Show content for who logged in
 ```
 [if is_user_logged_in]
 Welcome
 [else]
 You must login to see this content
 [/if]
 ```
 -
 # Translations
  * Arabic
  * English
