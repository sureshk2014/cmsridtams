<?php
global $admin_user;

//
// Themes
//

// minimal theme has the minimal template, and no styesheets.
verbose_msg(ilang('install_default_collections'));

$minimal_theme = new CmsLayoutCollection();
$minimal_theme->set_name('Minimal');  // id = 19
$minimal_theme->set_description('Minimal templates and stylesheets');
$minimal_theme->save();

$simplex_theme = new CmsLayoutCollection();
$simplex_theme->set_name('Simplex');
$simplex_theme->set_description('Simplex Template is a HTML5 based theme, introduced with CMSMS 1.11 release and improved with 2.0 release.
Purpose of this theme is to demonstrate what and how can be done with CMSMS Templates using HTML5 and responsive CSS for a better mobile experience.
All Smarty templates which are used by Simplex Theme are prefix with "Simplex", therefore be careful when renaming or deleting these templates.
Theme itself is using jQuery, which is included with {cms_jquery} tag, the functions JavaScript file is minified, in case you wish to change some JavaScript functions, refer to /uploads/simplex/js/functions.js file and replace functions.min.js file.');
$simplex_theme->set_default(TRUE);
$simplex_theme->save();

$css_menuleft_1col_theme = new CmsLayoutCollection();
$css_menuleft_1col_theme->set_name('CSSMenu left + 1 column');
$css_menuleft_1col_theme->set_description('This is basically the same as the last one, CSSMenu top + 2 column, with the menu on the left instead of across the top there isn\'t a whole lot to say about it.');
$css_menuleft_1col_theme->save();

$css_menutop_2col_theme = new CmsLayoutCollection();
$css_menutop_2col_theme->set_name('CSSMenu top + 2 columns');
$css_menutop_2col_theme->set_description('This is a drop-down menu that is using only CSS (although some Javascript is required for Internet Explorer 6, note: IE6 will not let you use 2 of these menu types in a template at the same time as the second one will fail to open). It can be either vertical or horizontal.');
$css_menutop_2col_theme->save();

$leftsimple_1col_theme = new CmsLayoutCollection();
$leftsimple_1col_theme->set_name('Left simple navigation + 1 column');
$leftsimple_1col_theme->set_description('This template has the menu in left sidebar. The menu is using the Simple Navigation menu template. It is styled in the stylesheet called Navigation Simple - Vertical.');
$leftsimple_1col_theme->save();

$ncleanblue_theme = new CmsLayoutCollection();
$ncleanblue_theme->set_name('NCleanBlue');
$ncleanblue_theme->set_description('This one is using a new menu template so we can style the drop down for the children pages, using an image for the second ul going from the top down, it has an extra li at the bottom of the child pages ul <li class="separator once" style="list-style-type: none;">&nbsp; </li> this is used to hold the bottom image.');
$ncleanblue_theme->save();

$shadowmenu_left_1col_theme = new CmsLayoutCollection();
$shadowmenu_left_1col_theme->set_name('ShadowMenu left + 1 column');
$shadowmenu_left_1col_theme->set_description('Using the same menu template as the previous theme. We changed the child ul CSS to use a different top image. This involves changing some of the margin and padding as the images are a different shape. Note the difference in the second level and third level ul images, one has an arrow up and the other has an arrow left.');
$shadowmenu_left_1col_theme->save();

$shadowmenu_tab_2col_theme = new CmsLayoutCollection();
$shadowmenu_tab_2col_theme->set_name('ShadowMenu Tab + 2 columns');
$shadowmenu_tab_2col_theme->set_description('Using the same menu template as the previous theme. We changed the child ul CSS to use a different top image. This involves changing some of the margin and padding as the images are a different shape. Note the difference in the second level and third level ul images, one has an arrow up and the other has an arrow left.');
$shadowmenu_tab_2col_theme->save();

$topsimple_leftsubnav_1col_theme = new CmsLayoutCollection();
$topsimple_leftsubnav_1col_theme->set_name('Top simple navigation + left subnavigation + 1 column');
$topsimple_leftsubnav_1col_theme->set_description('With the Menu Manager you can easily split the navigation in two parts. On this page the top level in the page hierarchy is displayed horizontally and depending on what page is displayed a localized sub-menu is displayed vertically to the left.');
$topsimple_leftsubnav_1col_theme->save();


//
// Types
//
verbose_msg(ilang('install_templatetypes'));
$page_template_type = new CmsLayoutTemplateType();
$page_template_type->set_originator(CmsLayoutTemplateType::CORE);
$page_template_type->set_name('page');
$page_template_type->set_dflt_flag(TRUE);
$page_template_type->set_lang_callback('CmsTemplateResource::page_type_lang_callback');
$page_template_type->set_content_callback('CmsTemplateResource::reset_page_type_defaults');
$page_template_type->reset_content_to_factory();
$page_template_type->set_content_block_flag(TRUE);
$page_template_type->save();

$gcb_template_type = new CmsLayoutTemplateType();
$gcb_template_type->set_originator(CmsLayoutTemplateType::CORE);
$gcb_template_type->set_name('generic');
$gcb_template_type->set_lang_callback('CmsTemplateResource::generic_type_lang_callback');
$gcb_template_type->save();


//
// Template Categories
//


//
// Templates
//
$template_list = array();

verbose_msg(ilang('install_templates'));
$gcb = new CmsLayoutTemplate();
$gcb->set_name('footer');
$gcb->set_type($gcb_template_type);
$gcb->set_owner(1);
$gcb->set_content("<p>&copy; Copyright {custom_copyright} - CMS Made Simple<br />
This site is powered by <a class=\"external\" href=\"http://www.cmsmadesimple.org\">CMS Made Simple</a> version {cms_version}</p>");
$gcb->save();

$css_menuleft_1col_theme->add_template($gcb);
$css_menutop_2col_theme->add_template($gcb);
$leftsimple_1col_theme->add_template($gcb);
$ncleanblue_theme->add_template($gcb);
$shadowmenu_left_1col_theme->add_template($gcb);
$shadowmenu_tab_2col_theme->add_template($gcb);
$topsimple_leftsubnav_1col_theme->add_template($gcb);
$template_list[$gcb->get_name()] = $gcb->get_id();

$txt = <<<EOT
{process_pagedata}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
{* Change lang="en" to the language of your site *}

<head>

<title>{sitename} - {title}</title>
{* The sitename is changed in Site Admin/Global settings. {title} is the name of each page *}

{metadata}
{* Don\'t remove this! Metadata is entered in Site Admin/Global settings. *}

{cms_stylesheet}
{* This is how all the stylesheets attached to this template are linked to *}

</head>

<body>

      {* Start Navigation *}
      <div style="float: left; width: 25%;">
         {Navigator loadprops=0 template='minimal_menu'}
      </div>
      {* End Navigation *}

      {* Start Content *}
      <div>
         <h2>{title}</h2>
         {content}
      </div>
      {* End Content *}

</body>
</html>
EOT;
$template = new CmsLayoutTemplate();
$template->set_name('Minimal');
$template->set_owner(1);
$template->set_content($txt);
$template->set_description('A Simple, minimal page template');
$template->set_type($page_template_type);
$template->add_design($minimal_theme);
$template->save();
$template_list[$template->get_name()] = $template->get_id();

$txt = <<<EOT
{process_pagedata}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
{* Change lang="en" to the language of your site *}

{* note: anything inside these are smarty comments, they will not show up in the page source *}
  <head>
    <title>{sitename} - {title}</title>
{* The sitename is changed in Site Admin/Global settings. {title} is the name of each page *}

 {metadata}
{* Don't remove this! Metadata is entered in Site Admin/Global settings. *}

 {cms_stylesheet}
{* This is how all the stylesheets attached to this template are linked to it *}

 {cms_selflink dir="start" rellink=1}
 {cms_selflink dir="prev" rellink=1}
 {cms_selflink dir="next" rellink=1}
{* Relational links for interconnections between pages, good for accessibility and Search Engine Optimization *}

{* the literal below and the /literal at the end are needed whenever there are {"curly brackets"} as smarty will think it's something to process and will throw an error *}
 {literal}
<script type="text/JavaScript">
<!--
//pass min and max - measured against window width
function P7_MinMaxW(a,b){
var nw="auto",w=document.documentElement.clientWidth;
if(w>=b){nw=b+"px";}if(w<=a){nw=a+"px";}return nw;
}
//-->
</script>
    <!--[if lte IE 6]>
    <style type="text/css">
    #pagewrapper {width:expression(P7_MinMaxW(720,950));}
    #container {height: 1%;}
    </style>
    <![endif]-->
    {/literal}
{* The min and max page width for Internet Explorer is set here. For other browsers it's in the stylesheet "Layout Top menu + 2 columns" *}

    <!--[if lte IE 6]>
    <script type="text/javascript" src="modules/MenuManager/CSSMenu.js"></script>
    <![endif]-->
{* The above JavaScript is required for CSSMenu to work in IE *}

  </head>
  <body>
    <div id="pagewrapper">
{* first out side div/box *}

{* start accessibility skip links, anything with the class of accessibility is hidden with CSS from visual browsers *}
      <ul class="accessibility">
        <li>{anchor anchor='menu_vert' title='Skip to navigation' accesskey='n' text='Skip to navigation'}</li>
        <li>{anchor anchor='main' title='Skip to content' accesskey='s' text='Skip to content'}</li>
      </ul>
{* end accessibility skip links *}

      <hr class="accessibility" />
{* anything class="accessibility" is hidden for visual browsers by CSS *}

{* Start Header, with logo image that links to the default start page. Logo image is changed in the stylesheet  "Layout Left sidebar + 1 column" *}
      <div id="header">

{* this holds the name of the site on the right side *}
        <h2 class="headright">{sitename}</h2>

{* a link back to home page and the header left image/logo, text is hidden using CSS *}
        <h1>{cms_selflink dir="start" text="\$sitename"}</h1>
        <hr class="accessibility" />
      </div>
{* End Header *}

{* Start Search, the input "Submit" is using an image, CSS: input.search-button *}
      <div id="search">
      {Search}
      </div>
{* End Search *}

{* Start Breadcrumbs *}
      <div class="crbk">
{* holds the right image, we need 2 divs to be able to make this site fluid, if it was fixed width we could use one div, one image  *}

        <div class="breadcrumbs">
        {nav_breadcrumbs root='Home'}
          <hr class="accessibility" />
        </div>
      </div>
{* End Breadcrumbs *}

{* Start Content (Navigation and Content columns) *}
      <div id="content">

{* Start Sidebar, 2 divs one for top image one for bottom image *}
        <div id="sidebar">
          <div id="sidebara">

{* Start Navigation, stylesheet  "Navigation CSSMenu - Vertical" *}
            <h2 class="accessibility">Navigation</h2>
            {Navigator loadprops=0 template='cssmenu'}
            <hr class="accessibility" />
{* End Navigation *}

{* Start News, stylesheet  "Module News" *}
            <div id="news">
              <h2>News</h2>
              {News number='3' detailpage='news'}
            </div>
{* End News *}

          </div>
        </div>
{* End Sidebar *}

{* Start Content Area, the back1, back2, back3, hold the 3 outside images, main holds the 4th one, to make the box complete, if the template were fixed width not fluid we could use just 2 divs and 2 images, 1 top 1 bottom *}
        <div class="back1">
          <div class="back2">
            <div class="back3">
              <div id="main">
                <h2>{title}</h2>
                {content}
                <br />{* to insure space below the content *}

{* Start relational links *}
{* note this is the right side, when you float: divs you need to have float: right; divs first *}
            <div class="right49">
              <p>{anchor anchor='main' text='^ Top'}</p>
            </div>

            <div class="left49">
              <p> {cms_selflink dir="previous"}
{* The label parameter doesn't need to be there if you're using English, but is here to show how it's used if you don't want the English text "Previous page" *}
              <br />
              {cms_selflink dir="next"}
              </p>
            </div>
{* End relational links *}

                <hr class="accessibility" />
                <div class="clear">
                </div>
              </div>
            </div>
          </div>
        </div>
{* End Content Area *}

      </div>
{* End Content *}

{* Start Footer. Edit the footer in the Global Content Block called "footer" *}
      <div class="footback">
        <div id="footer">
{* stylesheet  "Navigation FatFootMenu" *}
          <div id="fooleft">
          {Navigator loadprops=0}
          </div>
          <div id="footrt">
          {global_content name='footer'}
          </div>
          <div class="clear"></div>
        </div>
      </div>
{* End Footer *}

    </div>
{* end pagewrapper *}
  </body>
</html>
EOT;
$template = new CmsLayoutTemplate();
$template->set_name('CSSMenu left + 1 column'); // id = 15
$template->set_owner(1);
$template->set_content($txt);
$template->set_description('This is a drop-down menu that is using only CSS (although some Javascript is required for Internet Explorer 6, note: IE6 will not let you use 2 of these menu types in a template at the same time as the second one will fail to open). It can be either vertical or horizontal.');
$template->set_type($page_template_type);
$template->save();
$css_menuleft_1col_theme->add_template($template);
$template_list[$template->get_name()] = $template->get_id();

$txt = <<<EOT
{process_pagedata}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
{* Change lang="en" to the language of your site *}

{* note: anything inside these are smarty comments, they will not show up in the page source *}

  <head>
    <title>{sitename} - {title}</title>
{* The sitename is changed in Site Admin/Global settings. {title} is the name of each page *}

 {metadata}
{* Don't remove this! Metadata is entered in Site Admin/Global settings. *}

 {cms_stylesheet}
{* This is how all the stylesheets attached to this template are linked to it *}

 {cms_selflink dir="start" rellink=1}
 {cms_selflink dir="prev" rellink=1}
 {cms_selflink dir="next" rellink=1}
{* Relational links for interconnections between pages, good for accessibility and Search Engine Optimization *}

{* the literal below and the /literal at the end are needed whenever there are {"curly brackets"} as smarty will think it's something to process and will throw an error *}
 {literal}
<script type="text/JavaScript">
<!--
//pass min and max - measured against window width
function P7_MinMaxW(a,b){
var nw="auto",w=document.documentElement.clientWidth;
if(w>=b){nw=b+"px";}if(w<=a){nw=a+"px";}return nw;
}
//-->
</script>
    <!--[if lte IE 6]>
    <style type="text/css">
    #pagewrapper {width:expression(P7_MinMaxW(720,950));}
    #container {height: 1%;}
    </style>
    <![endif]-->
    {/literal}
{* The min and max page width for Internet Explorer is set here. For other browsers it's in the stylesheet "Layout Top menu + 2 columns" *}

    <!--[if lte IE 6]>
    <script type="text/javascript" src="modules/MenuManager/CSSMenu.js"></script>
    <![endif]-->
{* The above JavaScript is required for CSSMenu to work in IE *}
  </head>
  <body>
    <div id="pagewrapper">

{* start accessibility skip links, anything with the class of accessibility is hidden with CSS from visual browsers *}
      <ul class="accessibility">
        <li>{anchor anchor='menu_vert' title='Skip to navigation' accesskey='n' text='Skip to navigation'}</li>
        <li>{anchor anchor='main' title='Skip to content' accesskey='s' text='Skip to content'}</li>
      </ul>
{* end accessibility skip links *}

      <hr class="accessibility" />
{* Horizontal ruler that is hidden for visual browsers by CSS *}

{* Start Header, with logo image that links to the default start page. Logo image is changed in the stylesheet  "Layout Top menu + 2 columns" *}
      <div id="header">

{* this holds the name of the site on the right side *}
        <h2 class="headright">{sitename}</h2>

{* a link back to home page and the header left image/logo, text is hidden using CSS *}
        <h1>{cms_selflink dir="start" text="\$sitename"}</h1>
        <hr class="accessibility" />
      </div>
{* End Header *}

{* Start Navigation *}
      <div id="menu_vert">
{* stylesheet  "Navigation CSSMenu - Horizontal" *}
        <h2 class="accessibility">Navigation</h2>
        {Navigator loadprops=0 template='cssmenu'}
        <hr class="accessibility" />
      </div>
{* End Navigation *}

{* Start Search, the input "Submit" is using an image, CSS: input.search-button *}
      <div id="search">
      {Search}
      </div>
{* End Search *}

{* Start Breadcrumbs *}
      <div class="crbk">
{* holds the right image, we need 2 divs to be able to make this site fluid, if it was fixed width we could use one div, one image  *}

        <div class="breadcrumbs">
        {nav_breadcrumbs root='Home'}
          <hr class="accessibility" />
        </div>
      </div>
{* End Breadcrumbs *}

{* Start Content *}
      <div id="content">

{* Start Sidebar *}
        <div id="sidebar">
          <div id="sidebarb">
          {content block='Sidebar'}

{* Start News, stylesheet  "Module News" *}
            <div id="news">
              <h2>News</h2>
              {News number='3' detailpage='news'}
            </div>
{* End News *}

          </div>
        </div>
{* End Sidebar *}

{* Start Content Area, the back1, back2, back3, hold the 3 outside images, main holds the 4th one, to make the box complete, if the template were fixed width not fluid we could use just 2 divs and 2 images, 1 top 1 bottom *}
        <div class="back1">
          <div class="back2">
            <div class="back3">
              <div id="main">
                <h2>{title}</h2>
                {content}
                <br />{* to insure space below content *}

{* Start relational links *}
{* note this is the right side, when you float: divs you need to have float: right; divs first *}
            <div class="right49">
              <p>{anchor anchor='main' text='^ Top'}</p>
            </div>
            <div class="left49">
              <p>{cms_selflink dir="previous"}
{* The label parameter doesn't need to be there if you're using English, but is here to show how it's used if you don't want the English text "Previous page" *}

              <br />
              {cms_selflink dir="next"}
              </p>
            </div>
{* End relational links *}

                <hr class="accessibility" />
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
{* End Content Area *}

      </div>
{* End Content *}

{* Start Footer. Edit the footer in the Global Content Block called "footer" *}
      <div class="footback">
        <div id="footer">
{* stylesheet  "Navigation FatFootMenu" *}
          <div id="fooleft">
          {Navigator loadprops=0}
          </div>
          <div id="footrt">
          {global_content name='footer'}
          </div>
          <div class="clear"></div>
        </div>
      </div>
{* End Footer *}

    </div>
{* end pagewrapper *}

  </body>
</html>
EOT;
$template = new CmsLayoutTemplate();
$template->set_name('CSSMenu top + 2 columns'); // id = 16
$template->set_owner(1);
$template->set_content($txt);
$template->set_description('This is a drop-down menu that is using only CSS (although some Javascript is required for Internet Explorer 6, note: IE6 will not let you use 2 of these menu types in a template at the same time as the second one will fail to open). It can be either vertical or horizontal.');
$template->set_type($page_template_type);
$template->save();
$css_menutop_2col_theme->add_template($template);
$template_list[$template->get_name()] = $template->get_id();

$txt = <<<EOT
{process_pagedata}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
{* Change lang="en" to the language of your site *}

{* note: anything inside these are smarty comments, they will not show up in the page source *}

  <head>
    <title>{sitename} - {title}</title>
{* The sitename is changed in Site Admin/Global settings. {title} is the name of each page *}

 {metadata}
{* Don't remove this! Metadata is entered in Site Admin/Global settings. *}

 {cms_stylesheet}
{* This is how all the stylesheets attached to this template are linked to it *}

 {cms_selflink dir="start" rellink=1}
 {cms_selflink dir="prev" rellink=1}
 {cms_selflink dir="next" rellink=1}
{* Relational links for interconnections between pages, good for accessibility and Search Engine Optimization *}

{* the literal below and the /literal at the end are needed whenever there are {"curly brackets"} as smarty will think it's something to process and will throw an error *}
 {literal}
<script type="text/JavaScript">
<!--
//pass min and max - measured against window width
function P7_MinMaxW(a,b){
var nw="auto",w=document.documentElement.clientWidth;
if(w>=b){nw=b+"px";}if(w<=a){nw=a+"px";}return nw;
}
//-->
</script>
    <!--[if lte IE 6]>
    <style type="text/css">
    #pagewrapper {width:expression(P7_MinMaxW(720,1200));}
    #container {height: 1%;}
    </style>
    <![endif]-->
    {/literal}
{* The min and max page width for Internet Explorer is set here. For other browsers it's in the stylesheet "Layout Left sidebar + 1 column" *}

  </head>
  <body>
    <div id="pagewrapper">

{* start accessibility skip links, anything with the class of accessibility is hidden with CSS from visual browsers *}
      <ul class="accessibility">
        <li>{anchor anchor='menu_vert' title='Skip to navigation' accesskey='n' text='Skip to navigation'}</li>
        <li>{anchor anchor='main' title='Skip to content' accesskey='s' text='Skip to content'}</li>
      </ul>
{* end accessibility skip links *}

      <hr class="accessibility" />
{* anything with class="accessibility is hidden for visual browsers by CSS *}

{* Start Header, with logo image that links to the default start page. Logo image is changed in the stylesheet  "Layout Left sidebar + 1 column" *}
      <div id="header">

{* this holds the name of the site on the right side *}
        <h2 class="headright">{sitename}</h2>

{* this holds a link back to home page and the header left image/logo, text is hidden using CSS *}
        <h1>{cms_selflink dir="start" text="\$sitename"}</h1>

        <hr class="accessibility" />
      </div>
{* End Header *}

{* Start Search, the input "Submit" is using an image, CSS: input.search-button *}
      <div id="search">
      {Search}
      </div>
{* End Search *}

{* Start Breadcrumbs *}
      <div class="crbk">
{* holds the right image, we need 2 divs to be able to make this site fluid, if it was fixed width we could use one div, one image  *}

        <div class="breadcrumbs">
        {nav_breadcrumbs root='Home'}
          <hr class="accessibility" />
        </div>
      </div>
{* End Breadcrumbs *}

{* Start Content (Navigation and Content columns) *}
      <div id="content">

{* Start Sidebar, 2 divs one for top image one for bottom image *}
        <div id="sidebar">
          <div id="sidebara">

{* Start Navigation, stylesheet  "Navigation Simple - Vertical" *}
            <div id="menu_vert">
              <h2 class="accessibility">Navigation</h2>
              {Navigator loadprops=0 template='Simple Navigation' collapse='1'}
            </div>
{* End Navigation *}

{* Start News, style sheet "Module News" *}
            <div id="news">
              <h2>News</h2>
              {News number='3' detailpage='news'}
            </div>
{* End News *}

          </div>
        </div>
{* End Sidebar *}

{* Start Content Area *}
{* again 2 divs to hold top and bottom images, back is set to go to the right side then the main is set to come off the right side *}
        <div class="back">
          <div id="main">
            <h2>{title}</h2>
            {content}
            <br />
{* this break is just to make sure we get space after the content *}

{* Start relational links *}
{* note this is the right side, when you float: divs you need to have float: right; divs first *}
            <div class="right49">
              <p>{anchor anchor='main' text='^ Top'}</p>
            </div>

            <div class="left49">
              <p>{cms_selflink dir="previous"}
{* The label parameter doesn't need to be there if you're using English, but is here to show how it's used if you don't want the English text "Previous page" *}

              <br />
              {cms_selflink dir="next"}
              </p>
            </div>
{* End relational links *}

            <hr class="accessibility" />
          </div>
        </div>
{* End Content Area *}

        <div class="clear"></div>
{* this is to make sure the 2 divs stay tight *}

      </div>
{* End Content *}

{* Start Footer. Edit the footer in the Global Content Block called "footer" *}
      <div class="footback">
        <div id="footer">
{* stylesheet  "Navigation FatFootMenu" *}
          <div id="fooleft">
          {Navigator loadprops=0}
          </div>
          <div id="footrt">
          {global_content name='footer'}
          </div>
          <div class="clear"></div>
        </div>
      </div>
{* End Footer *}

    </div>
{* end pagewrapper *}
  </body>
</html>
EOT;
$template = new CmsLayoutTemplate();
$template->set_name('Left simple navigation + 1 column'); // id = 17
$template->set_owner(1);
$template->set_content($txt);
$template->set_description('This template has the menu in left sidebar. The menu is using the Simple Navigation menu template. It is styled in the stylesheet called Navigation Simple - Vertical.');
$template->set_type($page_template_type);
$template->save();
$leftsimple_1col_theme->add_template($template);
$template_list[$template->get_name()] = $template->get_id();

$txt = <<<EOT
{process_pagedata}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
{* Change lang="en" to the language of your site *}

{* note: anything inside these are smarty comments, they will not show up in the page source *}

  <head>
    <title>{sitename} - {title}</title>
{* The sitename is changed in Site Admin/Global settings. {title} is the name of each page *}

 {metadata}
{* Don't remove this! Metadata is entered in Site Admin/Global settings. *}

 {cms_stylesheet}
{* This is how all the stylesheets attached to this template are linked to it *}

 {cms_selflink dir="start" rellink=1}
 {cms_selflink dir="prev" rellink=1}
 {cms_selflink dir="next" rellink=1}
{* Relational links for interconnections between pages, good for accessibility and Search Engine Optimization *}

{* the literal below and the /literal at the end are needed whenever there are {"curly brackets"} as smarty will think it's something to process and will throw an error *}
 {literal}
<script type="text/JavaScript">
<!--
//pass min and max - measured against window width
function P7_MinMaxW(a,b){
var nw="auto",w=document.documentElement.clientWidth;
if(w>=b){nw=b+"px";}if(w<=a){nw=a+"px";}return nw;
}
//-->
</script>
    <!--[if lte IE 6]>
    <style type="text/css">
    #pagewrapper {width:expression(P7_MinMaxW(720,950));}
    #container {height: 1%;}
    </style>
    <![endif]-->
    {/literal}
{* The min and max page width for Internet Explorer is set here. For other browsers it's in the stylesheet "Layout Top menu + 2 columns" *}

  </head>
  <body>
    <div id="pagewrapper">

{* start accessibility skip links, anything with the class of accessibility is hidden with CSS from visual browsers *}
      <ul class="accessibility">
        <li>{anchor anchor='menu_vert' title='Skip to navigation' accesskey='n' text='Skip to navigation'}</li>
        <li>{anchor anchor='main' title='Skip to content' accesskey='s' text='Skip to content'}</li>
      </ul>
{* end accessibility skip links *}

      <hr class="accessibility" />
{* Horizontal ruler that is hidden for visual browsers by CSS *
}
{* Start Header, with logo image that links to the default start page. Logo image is changed in the stylesheet  "Layout Top menu + 2 columns" *}
      <div id="header">

{* this holds the name of the site on the right side *}
        <h2 class="headright">{sitename}</h2>

{* this holds a link back to home page and the header left image/logo, text is hidden using CSS *}
        <h1>{cms_selflink dir="start" text="\$sitename"}</h1>
        <hr class="accessibility" />
      </div>
{* End Header *}

{* Start Navigation *}
      <div id="menu_horiz">
{* stylesheet  "Navigation Simple - Horizontal" *}
        <h2 class="accessibility">Navigation</h2>
        {Navigator loadprops=0 template='Simple Navigation' number_of_levels='1'}
        <hr class="accessibility" />
      </div>
{* End Navigation *}
{* Start Search, the input "Submit" is using an image, CSS: input.search-button *}
      <div id="search">
      {Search}
      </div>
{* End Search *}

{* Start Breadcrumbs *}
      <div class="crbk">
{* holds the right image, we need 2 divs to be able to make this site fluid, if it was fixed width we could use one div, one image  *}

        <div class="breadcrumbs">
        {nav_breadcrumbs root='Home'}
          <hr class="accessibility" />
        </div>
      </div>
{* End Breadcrumbs *}

{* Start Content (Navigation and Content columns) *}
      <div id="content">

{* Start Sidebar, 2 divs one for top image one for bottom image *}
        <div id="sidebar">
          <div id="sidebara">

{* Start Sub Navigation, stylesheet  "Navigation Simple - Vertical" *}
            <div id="menu_vert">
              <h2 class="accessibility">Sub Navigation</h2>
              {Navigator loadprops=0 template='Simple Navigation' start_level='2' collapse='1'}
                <hr class="accessibility" />
            </div>
{* End Sub Navigation *}

{* Start News, style sheet "Module News" *}
            <div id="news">
              <h2>News</h2>
              {News number='3' detailpage='news'}
            </div>
{* End News *}

          </div>
        </div>
{* End Sidebar *}

{* Start Content Area, the back1, back2, back3, hold the 3 outside images, main holds the 4th one, to make the box complete, if the template were fixed width not fluid we could use just 2 divs and 2 images, 1 top 1 bottom *}
        <div class="back1">
          <div class="back2">
            <div class="back3">
              <div id="main">
                <h2>{title}</h2>
                {content}
                <br />{* to insure space below content *}

{* Start relational links *}
{* note this is the right side, when you float: divs you need to have float: right; divs first *}
            <div class="right49">
              <p>{anchor anchor='main' text='^ Top'}</p>
            </div>
            <div class="left49">
              <p>{cms_selflink dir="previous"}
{* The label parameter doesn't need to be there if you're using English, but is here to show how it's used if you don't want the English text "Previous page" *}

              <br />
              {cms_selflink dir="next"}
              </p>
            </div>
{* End relational links *}

                <hr class="accessibility" />
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
{* End Content Area *}

      </div>
{* End Content *}

{* Start Footer. Edit the footer in the Global Content Block called "footer" *}
      <div class="footback">
        <div id="footer">
{* stylesheet  "Navigation FatFootMenu" *}
          <div id="fooleft">
          {Navigator loadprops=0}
          </div>
          <div id="footrt">
          {global_content name='footer'}
          </div>
          <div class="clear"></div>
        </div>
      </div>
{* End Footer  *}

    </div>
{* end pagewrapper *}

  </body>
</html>
EOT;
$template = new CmsLayoutTemplate();
$template->set_name('Top simple navigation + left subnavigation + 1 column'); // id = 18
$template->set_owner(1);
$template->set_content($txt);
$template->set_description('With the Menu Manager you can easily split the navigation in two parts. On this page the top level in the page hierarchy is displayed horizontally and depending on what page is displayed a localized sub-menu is displayed vertically to the left.');
$template->set_type($page_template_type);
$template->save();
$topsimple_leftsubnav_1col_theme->add_template($template);
$template_list[$template->get_name()] = $template->get_id();

$txt = <<<EOT
{process_pagedata}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
{* Change lang="en" to the language of your site *}

{* note: anything inside these are smarty comments, they will not show up in the page source *}

  <head>
    <title>{sitename} - {title}</title>
{* The sitename is changed in Site Admin/Global settings. {title} is the name of each page *}

 {metadata}
{* Don't remove this! Metadata is entered in Site Admin/Global settings. *}

 {cms_stylesheet}
{* This is how all the stylesheets attached to this template are linked to it *}

 {cms_selflink dir="start" rellink=1}
 {cms_selflink dir="prev" rellink=1}
 {cms_selflink dir="next" rellink=1}
{* Relational links for interconnections between pages, good for accessibility and Search Engine Optimization *}

{* the literal below and the /literal at the end are needed whenever there are {"curly brackets"} as smarty will think it's something to process and will throw an error *}
 {literal}
<script type="text/JavaScript">
<!--
//pass min and max - measured against window width
function P7_MinMaxW(a,b){
var nw="auto",w=document.documentElement.clientWidth;
if(w>=b){nw=b+"px";}if(w<=a){nw=a+"px";}return nw;
}
//-->
</script>
    <!--[if lte IE 6]>
    <style type="text/css">
    #pagewrapper {width:expression(P7_MinMaxW(720,950));}
    #container {height: 1%;}
    </style>
    <![endif]-->
    {/literal}
{* The min and max page width for Internet Explorer is set here. For other browsers it's in the stylesheet "Layout Top menu + 2 columns" *}

    <!--[if lte IE 6]>
    <script type="text/javascript" src="modules/MenuManager/CSSMenu.js"></script>
    <![endif]-->
{* The above JavaScript is required for CSSMenu to work in IE *}

  </head>
  <body>
    <div id="pagewrapper">

{* start accessibility skip links, anything with the class of accessibility is hidden with CSS from visual browsers *}
      <ul class="accessibility">
        <li>{anchor anchor='menu_vert' title='Skip to navigation' accesskey='n' text='Skip to navigation'}</li>
        <li>{anchor anchor='main' title='Skip to content' accesskey='s' text='Skip to content'}</li>
      </ul>
{* end accessibility skip links *}

      <hr class="accessibility" />
{* Horizontal ruler that is hidden for visual browsers by CSS *}

{* Start Header, with logo image that links to the default start page. Logo image is changed in the stylesheet  "Layout Top menu + 2 columns" *}
      <div id="header">

{* this holds the name of the site on the right side *}
        <h2 class="headright">{sitename}</h2>

{* a link back to home page and the header left image/logo, text is hidden using CSS *}
        <h1>{cms_selflink dir="start" text="\$sitename"}</h1>
        <hr class="accessibility" />
      </div>
{* End Header *}

{* Start Navigation, stylesheet "Navigation ShadowMenu - Horizontal" *}
      <div id="menu_vert">
        <h2 class="accessibility">Navigation</h2>
        {Navigator loadprops=0 template='cssmenu_ulshadow'}
        <hr class="accessibility" />
      </div>
{* End Navigation *}

{* Start Search, the input "Submit" is using an image, CSS: input.search-button *}
      <div id="search">
      {Search}
      </div>
{* End Search *}

{* Start Breadcrumbs *}
      <div class="crbk">
{* holds the right image, we need 2 divs to be able to make this site fluid, if it was fixed width we could use one div, one image  *}

        <div class="breadcrumbs">
        {nav_breadcrumbs root='Home'}
          <hr class="accessibility" />
        </div>
      </div>
{* End Breadcrumbs *}

{* Start Content *}
      <div id="content">

{* Start Sidebar *}
        <div id="sidebar">
          <div id="sidebarb">
          {content block='Sidebar'}

{* Start News, stylesheet  "Module News" *}
            <div id="news">
              <h2>News</h2>
              {News number='3' detailpage='news'}
            </div>
{* End News *}

          </div>
        </div>
{* End Sidebar *}

{* Start Content Area, the back1, back2, back3, hold the 3 outside images, main holds the 4th one, to make the box complete, if the template were fixed width not fluid we could use just 2 divs and 2 images, 1 top 1 bottom *}
        <div class="back1">
          <div class="back2">
            <div class="back3">
              <div id="main">
                <h2>{title}</h2>
                {content}
                <br />{* to insure space below content *}

{* Start relational links *}
{* note this is the right side, when you float: divs you need to have float: right; divs first *}
            <div class="right49">
              <p>{anchor anchor='main' text='^ Top'}</p>
            </div>
            <div class="left49">
              <p>{cms_selflink dir="previous"}
{* The label parameter doesn't need to be there if you're using English, but is here to show how it's used if you don't want the English text "Previous page" *}

              <br />
              {cms_selflink dir="next"}
              </p>
            </div>
{* End relational links *}

                <hr class="accessibility" />
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
{* End Content Area *}

      </div>
{* End Content *}

{* Start Footer. Edit the footer in the Global Content Block called "footer" *}
      <div class="footback">
        <div id="footer">
{* stylesheet  "Navigation FatFootMenu" *}
          <div id="fooleft">
          {Navigator loadprops=0}
          </div>
          <div id="footrt">
          {global_content name='footer'}
          </div>
          <div class="clear"></div>
        </div>
      </div>
{* End Footer *}

    </div>
{* end pagewrapper *}

  </body>
</html>
EOT;
$template = new CmsLayoutTemplate();
$template->set_name('ShadowMenu Tab + 2 columns'); // id = 20
$template->set_owner(1);
$template->set_content($txt);
$template->set_description('Using the same menu template as the previous theme. We changed the child ul CSS to use a different top image. This involves changing some of the margin and padding as the images are a different shape. Note the difference in the second level and third level ul images, one has an arrow up and the other has an arrow left.');
$template->set_type($page_template_type);
$template->save();
$shadowmenu_tab_2col_theme->add_template($template);
$template_list[$template->get_name()] = $template->get_id();

$txt = <<<EOT
{process_pagedata}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
{* Change lang="en" to the language of your site *}

{* note: anything inside these are smarty comments, they will not show up in the page source *}

  <head>
    <title>{sitename} - {title}</title>
{* The sitename is changed in Site Admin/Global settings. {title} is the name of each page *}

 {metadata}
{* Don't remove this! Metadata is entered in Site Admin/Global settings. *}

 {cms_stylesheet}
{* This is how all the stylesheets attached to this template are linked to it *}

 {cms_selflink dir="start" rellink=1}
 {cms_selflink dir="prev" rellink=1}
 {cms_selflink dir="next" rellink=1}
{* Relational links for interconnections between pages, good for accessibility and Search Engine Optimization *}

{* the literal below and the /literal at the end are needed whenever there are {"curly brackets"} as smarty will think it's something to process and will throw an error *}
 {literal}
<script type="text/JavaScript">
<!--
//pass min and max - measured against window width
function P7_MinMaxW(a,b){
var nw="auto",w=document.documentElement.clientWidth;
if(w>=b){nw=b+"px";}if(w<=a){nw=a+"px";}return nw;
}
//-->
</script>
    <!--[if lte IE 6]>
    <style type="text/css">
    #pagewrapper {width:expression(P7_MinMaxW(720,950));}
    #container {height: 1%;}
    </style>
    <![endif]-->
    {/literal}
{* The min and max page width for Internet Explorer is set here. For other browsers it's in the stylesheet "Layout Top menu + 2 columns" *}

    <!--[if lte IE 6]>
    <script type="text/javascript" src="modules/MenuManager/CSSMenu.js"></script>
    <![endif]-->
{* The above JavaScript is required for CSSMenu to work in IE *}

  </head>
  <body>
    <div id="pagewrapper">

{* start accessibility skip links, anything with the class of accessibility is hidden with CSS from visual browsers *}
      <ul class="accessibility">
        <li>{anchor anchor='menu_vert' title='Skip to navigation' accesskey='n' text='Skip to navigation'}</li>
        <li>{anchor anchor='main' title='Skip to content' accesskey='s' text='Skip to content'}</li>
      </ul>
{* end accessibility skip links *}

      <hr class="accessibility" />
{* Horizontal ruler that is hidden for visual browsers by CSS *}

{* Start Header, with logo image that links to the default start page. Logo image is changed in the stylesheet  "Layout Left sidebar + 1 column" *}
      <div id="header">

{* this holds the name of the site on the right side *}
        <h2 class="headright">{sitename}</h2>

{* this holds a link back to home page and the header left image/logo, text is hidden using CSS *}
        <h1>{cms_selflink dir="start" text="\$sitename"}</h1>
        <hr class="accessibility" />
      </div>
{* End Header *}

{* Start Search, the input "Submit" is using an image, CSS: input.search-button *}
      <div id="search">
      {Search}
      </div>
{* End Search *}

{* Start Breadcrumbs *}
      <div class="crbk">
{* holds the right image, we need 2 divs to be able to make this site fluid, if it was fixed width we could use one div, one image  *}

        <div class="breadcrumbs">
        {nav_breadcrumbs root='Home'}
          <hr class="accessibility" />
        </div>
      </div>
{* End Breadcrumbs *}

{* Start Content (Navigation and Content columns) *}
      <div id="content">

{* Start Sidebar, 2 divs one for top image one for bottom image *}
        <div id="sidebar">
          <div id="sidebara">

{* Start Navigation, stylesheet  "Navigation ShadowMenu - Vertical" *}
            <h2 class="accessibility">Navigation</h2>
            {Navigator loadprops=0 template='cssmenu_ulshadow'}
            <hr class="accessibility" />

{* Start News, stylesheet  "Module News" *}
            <div id="news">
              <h2>News</h2>
              {News number='3' detailpage='news'}
            </div>
{* End News *}

          </div>
        </div>
{* End Sidebar *}

{* Start Content Area, the back1, back2, back3, hold the 3 outside images, main holds the 4th one, to make the box complete, if the template were fixed width not fluid we could use just 2 divs and 2 images, 1 top 1 bottom *}
        <div class="back1">
          <div class="back2">
            <div class="back3">
              <div id="main">
                <h2>{title}</h2>
                {content}
                <br />{* to insure space below content *}

{* Start relational links *}
{* note this is the right side, when you float: divs you need to have float: right; divs first *}
            <div class="right49">
              <p>{anchor anchor='main' text='^ Top'}</p>
            </div>
            <div class="left49">
              <p>{cms_selflink dir="previous"}
{* The label parameter doesn't need to be there if you're using English, but is here to show how it's used if you don't want the English text "Previous page" *}

              <br />
              {cms_selflink dir="next"}
              </p>
            </div>
{* End relational links *}

                <hr class="accessibility" />
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
{* End Content Area *}

      </div>
{* End Content *}

{* Start Footer. Edit the footer in the Global Content Block called "footer" *}
      <div class="footback">
        <div id="footer">
{* stylesheet  "Navigation FatFootMenu" *}
          <div id="fooleft">
          {Navigator loadprops=0}
          </div>
          <div id="footrt">
          {global_content name='footer'}
          </div>
          <div class="clear"></div>
        </div>
      </div>
{* End Footer *}

    </div>
{* end pagewrapper *}

  </body>
</html>
EOT;
$template = new CmsLayoutTemplate();
$template->set_name('ShadowMenu left + 1 column'); // id = 21
$template->set_owner(1);
$template->set_content($txt);
$template->set_description('Using the same menu template as the previous theme. We changed the child ul CSS to use a different top image. This involves changing some of the margin and padding as the images are a different shape. Note the difference in the second level and third level ul images, one has an arrow up and the other has an arrow left.');
$template->set_type($page_template_type);
$template->save();
$shadowmenu_left_1col_theme->add_template($template);
$template_list[$template->get_name()] = $template->get_id();

$txt = <<<EOT
{process_pagedata}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
{* Change lang="en" to the language of your site *}

{* note: anything inside these are smarty comments, they will not show up in the page source *}
  <head>
{if isset(\$canonical)}<link rel="canonical" href="{\$canonical}" />{elseif isset(\$content_obj)}<link rel="canonical" href="{\$content_obj->GetURL()}" />{/if}

<title>{title} | {sitename}</title>
{* The sitename is changed in Site Admin/Global settings. {title} is the name of each page *}

{metadata}
{* Don't remove this! Metadata is entered in Site Admin/Global settings. *}

{cms_stylesheet}
{* This is how all the stylesheets attached to this template are linked to *}

{cms_selflink dir="start" rellink=1}
{cms_selflink dir="prev" rellink=1}
{cms_selflink dir="next" rellink=1}
{* Relational links for interconnections between pages, good for accessibility and Search Engine Optmization *}

<!--[if IE 6]>
<script type="text/javascript" src="modules/MenuManager/CSSMenu.js"></script>
<![endif]-->
{* The above JavaScript is required for Menu - NCleanBlue-css to work in IE6 *}

{* the literal below and the /literal at the end are needed whenever there are {"curly brackets"} as smarty will think it's something to process and will throw an error *}
{* IE6 png fix *}
{literal}
<!--[if IE 6]>
<script type="text/javascript"  src="uploads/NCleanBlue/js/ie6fix.js"></script>
<script type="text/javascript">
 // argument is a CSS selector
 DD_belatedPNG.fix('.sbar-top,.sbar-bottom,.main-top,.main-bottom,#version');
</script>
<style type="text/css">
/* enable background image caching in IE6 */
html {filter:expression(document.execCommand("BackgroundImageCache", false, true));}
</style>
<![endif]-->
{/literal}

  </head>
  <body>
    <div id="ncleanblue">
      <div id="pagewrapper" class="core-wrap-960 core-center">
{* start accessibility skip links *}
        <ul class="accessibility">
          <li>{anchor anchor='menu_vert' title='Skip to navigation' accesskey='n' text='Skip to navigation'}</li>
          <li>{anchor anchor='main' title='Skip to content' accesskey='s' text='Skip to content'}</li>
        </ul>
{* end accessibility skip links *}
        <hr class="accessibility" />
{* Horizontal ruler that is hidden for visual browsers by CSS *}

{* Start Header, with logo image that links to the default start page *}
        <div id="header" class="util-clearfix">
{* logo image that links to the default start page. Logo image is changed in the style sheet  "Layout NCleanBlue" *}
          <div id="logo" class="core-float-left">
            {cms_selflink dir="start" text="\$sitename"}
          </div>

{* Start Search, the input "Submit" is using an image, CSS: div#search input.search-button *}
          <div id="search" class="core-float-right">
            {Search search_method="post"}
          </div>
{* End Search *}
          <span class="util-clearb">&nbsp;</span>

{* Start Navigation, style sheet  "Layout NCleanBlue", starting at Menu  ROOT *}
          <h2 class="accessibility util-clearb">Navigation</h2>
{* anything class="accessibility" is hidden for visual browsers by CSS *}
          <div class="page-menu util-clearfix">
          {Navigator loadprops=0 template='cssmenu_ulshadow'}
          </div>
          <hr class="accessibility util-clearb" />
{* End Navigation *}

        </div>
{* End Header *}

{* Start Content (Navigation and Content columns) *}
        <div id="content" class="util-clearfix">

{* Start Optional tag CMS Version Information, also is a good example how smarty works, the big star that holds the version number, you may remove it here and the style sheet where it is marked. *}
          <div title="CMS - {cms_version} - {cms_versionname}" id="version">
          {capture assign='cms_version'}{cms_version|lower}{/capture}{"/-([a-z]).*/"|preg_replace:"":\$cms_version}
          </div>
{* End Optional tag  *}

{* Start Bar *}
          <div id="bar" class="util-clearfix">
{* Start Breadcrumbs, a bit of letting you know where your at *}
            <div class="breadcrumbs core-float-right">
              {nav_breadcrumbs root='Home'}
            </div>
{* End Breadcrumbs *}

            <hr class="accessibility util-clearb" />
          </div>
{* End Bar *}

{* Start left side *}
          <div id="left" class="core-float-left">
            <div class="sbar-top">
              <h2 class="sbar-title">News</h2>
            </div>
            <div class="sbar-main">
{* Start News *}
              <div id="news">
              {News number='3' detailpage='news'}
              </div>
              <img class="screen" src="uploads/NCleanBlue/screen-1.6.jpg" width="139" height="142" title="CMS - {cms_version} - {cms_versionname}" alt="CMS - {cms_version} - {cms_versionname}" />
{* End News *}
            </div>
            <span class="sbar-bottom">&nbsp;</span>
          </div>
{* End left side *}

{* Start Content Area, right side *}
          <div id="main"  class="core-float-right">

{* main top, holds top image *}
            <div class="main-top">
              </div>

{* main content *}
            <div class="main-main util-clearfix">
              <h1 class="title">{title}</h1>
            {content}
            </div>

{* Start main bottom and relational links *}
            <div class="main-bottom">
              <div class="right49 core-float-right">
              {anchor anchor='main' text='^&nbsp;&nbsp;Top'}
              </div>
              <div class="left49 core-float-left">
                <span>
                  {cms_selflink dir="previous"}&nbsp;
{* The label parameter doesn't need to be there if you're using English, but is here to show how it's used if you don't want the English text "Previous page" *}
                </span>
                <span>
                  {cms_selflink dir="next"}&nbsp;
                </span>
              </div>
{* End relational links *}

              <hr class="accessibility" />
            </div>
{* End main bottom *}

          </div>
{* End Content Area, right side *}

        </div>
{* End Content *}

      </div>
{* end pagewrapper *}
      <span class="util-clearb">&nbsp;</span>

{* Start Footer *}
      <div id="footer-wrapper">
        <div id="footer" class="core-wrap-960">
{* first foot menu *}
          <div class="block core-float-left">
            {Navigator loadprops=0 template='minimal_menu'  number_of_levels='1'}
          </div>

{* second foot menu if active page has children *}
          <div class="block core-float-left">
            {Navigator loadprops=0 template='minimal_menu'  start_level="2"}
          </div>

{* edit the footer in the Global Content Block called "footer" *}
          <div class="block cms core-float-left">
            {global_content name='footer'}
          </div>

          <span class="util-clearb">&nbsp;</span>
        </div>
      </div>
{* End Footer *}
    </div>
{* End Div *}
  </body>
</html>
EOT;
$template = new CmsLayoutTemplate();
$template->set_name('NCleanBlue'); // id = 22
$template->set_owner(1);
$template->set_content($txt);
$template->set_description('This one is using a new menu template so we can style the drop down for the children pages, using an image for the second ul going from the top down, it has an extra li at the bottom of the child pages ul <li class="separator once" style="list-style-type: none;">&nbsp; </li> this is used to hold the bottom image.');
$template->set_type($page_template_type);
$template->save();
$ncleanblue_theme->add_template($template);
$template_list[$template->get_name()] = $template->get_id();


$txt = <<<EOT
{strip}
{* used for page specific data or logic in Edit Content -> Logic *}
{process_pagedata}

{* ================
   THEME LOGIC
   ================ *}

{* With cms_lang_info we retrieve current language information, assign gives us \$nls variable we can work with *}
{cms_lang_info assign='nls'}
{* assigned url to theme related folder so we do not have to type full path each time *}
{\$theme_path = "{uploads_url}/simplex"}
{* assigned content tag, now we have all smarty variables available anywhere in template *}
{* assigned title tag to a variable which we can override with a module entry title for example *}
{title assign='main_title'}
{content assign='main_content'}
{* assigned prev and next links so we don't have empty html tags if there is no previous or next page *}
{cms_selflink dir='previous' assign='prev_page'}
{cms_selflink dir='next' assign='next_page'}

{* ensure that the smarty variables we created are copied to global scope for use elsewhere in the template *}
{share_data scope=parent vars='nls,theme_path,main_title,main_content,prev_page,next_page' scope=global}

{* using strip as we don't want useless whitespace, especially not before doctype *}
{/strip}<!doctype html>
<!--[if IE 8]>         <html lang='{\$nls->htmlarea()}' dir='{\$nls->direction()}' class='lt-ie9'> <![endif]-->
<!--[if gt IE 8]><!--> <html lang='{\$nls->htmlarea()}' dir='{\$nls->direction()}'> <!--<![endif]-->
    <head>
        <meta charset='{\$nls->encoding()}' />
        {metadata} {* Don't remove this! Metadata is entered in Site Admin/Global settings. *}
        <title>{\$main_title nocache} - {sitename}</title>
        <meta name='HandheldFriendly' content='True' />
        <meta name='MobileOptimized' content='320' />
        <meta name='viewport' content='width=device-width, initial-scale=1' />
        <meta http-equiv='cleartype' content='on' />
        <meta name='msapplication-TileImage' content='{\$theme_path}/images/icons/cmsms-152x152.png' />
        <meta name='msapplication-TileColor' content='#5C5A59' />
        {if isset(\$canonical)}<link rel='canonical' href='{\$canonical}' />{elseif isset(\$content_obj)}<link rel='canonical' href='{\$content_obj->GetURL()}' />{/if} {* See in news detail template how cannonical url can be assigned from module *}
        {cms_stylesheet} {* This is how all the stylesheets attached to this template are linked to *}
        <link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic|Oswald:700' rel='stylesheet' type='text/css' />
        <link rel='apple-touch-icon-precomposed' sizes='152x152' href='{\$theme_path}/images/icons/cmsms-152x152.png' />
        <link rel='apple-touch-icon-precomposed' sizes='120x120' href='{\$theme_path}/images/icons/cmsms-120x120.png' />
        <link rel='apple-touch-icon-precomposed' sizes='72x72' href='{\$theme_path}/images/icons/cmsms-76x76.png' />
        <link rel='apple-touch-icon-precomposed' href='{\$theme_path}/images/icons/cmsms-60x60.png' />
        <link rel='shortcut icon' sizes='196x196' href='{\$theme_path}/images/icons/cmsms-196x196.png' />
        <link rel='shortcut icon' href='{\$theme_path}/images/icons/cmsms-60x60.png' />
        <link rel='icon' href='{\$theme_path}/images/icons/favicon_cms.ico' type='image/x-icon' />
        {cms_selflink dir='start' rellink='1'} {* Relational links for interconnections between pages, good for accessibility and Search Engine Optmization *}
        {cms_selflink dir='prev' rellink='1'}
        {cms_selflink dir='next' rellink='1'}
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
    </head>
    <body id='boxed' class='container page-wrapper page-{\$page_alias} page-{\$content_id}'>
        <!-- #wrapper (wrapping content in a box) -->
        <div class='row' id='wrapper'>
            <!-- accessibility links, jump to nav or content -->
            <ul class="visuallyhidden">
                <li>{anchor anchor='nav' title='Skip to navigation' accesskey='n' text='Skip to navigation'}</li>
                <li>{anchor anchor='main' title='Skip to content' accesskey='s' text='Skip to content'}</li>
            </ul>
            <!-- accessibility //-->
            <!-- .top (top section of page containing logo, navigation search...) -->
            <header class='top inner-section'>
                <div class='row header'>
                    <!-- .logo (cmsms logo on the left side) -->
                    <div class='logo four-col'>
                        <a href='{root_url}' title='{sitename}'>
                            <img src='{\$theme_path}/images/cmsmadesimple-logo.png' width='60' height='60' alt='{sitename}' /> <!--  -->
                            <!-- <span class='palm'></span> -->
                        </a>
                    </div>
                    <!-- .logo //-->
                    <!-- .main-navigation (main navigation on the right side) -->
                    <nav class='main-navigation eight-col cf noprint' id='nav' role='navigation'>
                        {Navigator loadprops='0' template='Simplex Main Navigation'} {* A Navigator module, database Template *}
                    </nav>
                    <!-- .main-navigation //-->
                </div>
                <!-- .header-bottom (bottom part of header containing catchphrase and search field) -->
                <div class='row header-bottom'>
                    <section class='phrase cf'>
                        <span class='seven-col phrase-text'>Science of Impulsivity<br class='lt-768' /> and Cautious</span>
                        {Search|strip formtemplate='Simplex Search'} {* Search module using custom template in Design Manager, you should use resultpage parameter for search results (see module help) *}
                    </section>
                </div>
                <!-- .header-bottom //-->
                <!-- .banner (banner area for a slider or teaser image) -->
                {global_content name='Simplex Slideshow'}
                <!-- .banner //-->
            </header>
            <!-- .top //-->
            <!-- .content-wrapper (wrapping div for content area) -->
            <main role='main' class='content-wrapper inner-section'>
                <div class='row'>
                    <!-- .content-inner (display content first) -->
                    <div class='content-inner eight-col push-four'>
                        <!-- .content-top (breadcrumbs) -->
                        <div class='content-top cf' itemscope itemtype='http://data-vocabulary.org/Breadcrumb'>
                            {Navigator action='breadcrumbs'} {* you can create own breadcrumbs template as well and include it with template parameter *}
                            <span class='title-border' aria-hidden='true'></span>
                        </div>
                        <!-- .content-top //-->
                        <!-- .content (actual content with title and content tags) -->
                        <article class='content' id='main'>
                            <h1>{\$main_title nocache} </h1> {* title tag *}
                                {\$main_content nocache} {* content entered in page editor area, variable is assigned on top in template logic, using nocache as variables are cached with Smarty cache on *}
                        </article>
                        <!-- .content //-->
                    </div>
                    <!-- .content-inner //-->
                    <!-- .sidebar (then show sidebar) -->
                    <aside class='sidebar four-col pull-eight'>
                        {* sample of using News Module tag for summary of latest two articles, remember if News page is deleted you should change detailpage parameter *}
                        {News summarytemplate='Simplex News Summary' number='2' detailtemplate='Simplex News Detail'}
                    </aside>
                    <!-- .sidebar //-->
                    <div class='cf eight-col push-four'>
                        {if !empty(\$prev_page)}<span class='previous'>{\$prev_page nocache}</span>{/if}
                        {if !empty(\$next_page)}<span class='next'>{\$next_page nocache}</span>{/if}
                    </div>
                </div>
            </main>
            <!-- .content-wrapper //-->
            <!-- .footer (footer area) -->
            <footer class='footer inner-section'>
                <span class='back-top'><a href='{anchor anchor='main' onlyhref='1'}' id='scroll-top'><i class='icon-arrow-up' aria-hidden='true'></i></a></span>
                <div class='row'>
                    <section class='eight-col push-four noprint'>
                        <nav class='footer-navigation row'>
                            {Navigator template='Simplex Footer Navigation' excludeprefix='home' number_of_levels='2' loadprops='0'}
                        </nav>
                    </section>
                    <section class='four-col pull-eight copyright'>
                        {global_content|strip name='Simplex Footer'} {* generic Design Manager template *}
                    </section>
                </div>
            </footer>
        <!-- #wrapper //-->
        </div>
    {cms_jquery exclude='ui,nestedSortable,json,migrate' append='uploads/simplex/js/jquery.sequence-min.js,uploads/simplex/js/functions.min.js'}{strip}
    {* if you are using some older jQuery plugin that relies on deprecated and removed functions that are no longer supported
       in jQuery 1.11.0 try removing "migrate" from exclude list which will include jQuery Migrate 1.2.1 Plugin.
       For more information about removed functions see: http://jquery.com/upgrade-guide/1.9/ *}{/strip}
    </body>
</html>
EOT;
$template = new CmsLayoutTemplate();
$template->set_name('Simplex');
$template->set_owner($admin_user->id);
$template->set_content($txt);
$template->set_description('A HTML5 based responsive template');
$template->set_type($page_template_type);
$template->set_type_dflt(TRUE);
$template->save();
$simplex_theme->add_template($template);
$template_list[$template->get_name()] = $template->get_id();

$txt = <<<EOT
{strip}

{* A simple Smarty array for our slideshow *}
{\$slides = []}

{\$slides.0.heading = 'Response Engineering'}
{\$slides.0.subheading = 'Impuls &amp; Caution'}
{\$slides.0.image = 'palm-logo.png'}

{\$slides.1.heading = 'Internet of Things'}
{\$slides.1.subheading = 'Cyber Security'}
{\$slides.1.image = 'mate-zimple.png'}

{\$slides.2.heading = 'Cyberbullying'}
{\$slides.2.subheading = 'Rumors Threats Insults'}
{\$slides.2.image = 'mobile-devices-scene.png'}

{\$slides.3.heading = 'Identify Theft'}
{\$slides.3.subheading = 'Data Protection'}
{\$slides.3.image = 'browser-scene.png'}

{* Markup *}
<section class='banner row noprint' id='sx-slides' role='banner'>
    <ul class="sequence-canvas">
        {foreach \$slides as \$slide}
        <li{if \$slide@first} class='animate-in'{/if}>
            {if !empty(\$slide.heading)}<h2 class='title'>{\$slide.heading}</h2>{/if}
            {if !empty(\$slide.subheading)}<h3 class='subtitle'>{\$slide.subheading}</h3>{/if}
            {if !empty(\$slide.image)}<img class='image' src='{uploads_url}/simplex/teaser/{\$slide.image}' alt='{\$slide.heading|cms_escape:'htmlall'}' />{/if}
        </li>
        {/foreach}
    </ul>
</section>

{/strip}
EOT;
$gcb_sx_slideshow = new CmsLayoutTemplate();
$gcb_sx_slideshow->set_name('Simplex Slideshow');
$gcb_sx_slideshow->set_type($gcb_template_type);
$gcb_sx_slideshow->set_owner($admin_user->id);
$gcb_sx_slideshow->set_description('A sample slider for Simplex Theme.
Note: required jQuery Framework is already included at the bottom of Simplex Page Template.
If any of Modules that you are going to use requires or adds additional jQuery Framework, remember to either remove jQuery Framework from Module template (for example Gallery module) or to move {cms_jquery} tag in Simplex Page Template to <head> section of template if needed.
All current Browser come with some kind of Developer Tools (usually F12 key) or you can also install Firebug in Firefox or Chrome, if some JavaScript function doesn\'t work your first step would be to open Developer Tools and look into console errors.');
$gcb_sx_slideshow->set_content($txt);
$gcb_sx_slideshow->save();
$simplex_theme->add_template($gcb_sx_slideshow);

$txt = <<<EOT
{* Logic *}
{\$start_year = '2004'}
{\$current_year = \$smarty.now|date_format:'%Y'}

{* Template *}
<ul class='social cf'>
    <li class='twitter'><a title='Twitter' href='http://twitter.com/#!/cmsms'><i class='icon-twitter'></i><span class='visuallyhidden'>Twitter</span></a></li>
    <li class='facebook'><a title='Facebook' href='https://www.facebook.com/cmsmadesimple'><i class='icon-facebook'></i><span class='visuallyhidden'>Facebook</span></a></li>
    <li class='linkedin'><a title='LinkedIn' href='http://www.linkedin.com/groups?gid=1139537'><i class='icon-linkedin'></i><span class='visuallyhidden'>LinkedIn</span></a></li>
    <li class='youtube'><a title='YouTube' href='http://www.youtube.com/user/cmsmadesimple'><i class='icon-youtube'></i><span class='visuallyhidden'>YouTube</span></a></li>
    <li class='google'><a title='Google Plus' href='https://plus.google.com/+cmsmadesimple/posts'><i class='icon-google'></i><span class='visuallyhidden'>Google Plus</span></a></li>
    <li class='pinterest'><a title='Pinterest' href='http://www.pinterest.com/cmsmadesimple/'><i class='icon-pinterest'></i><span class='visuallyhidden'>Pinterest</span></a></li>
</ul>
<p class='copyright-info'>&copy; Copyright {\$start_year}{if \$start_year !== \$current_year} - {\$current_year}{/if} - CMS Made Simple<br /> This site is powered by <a href='http://www.cmsmadesimple.org'>CMS Made Simple</a> version {cms_version}</p>
EOT;
$gcb_sx_footer = new CmsLayoutTemplate();
$gcb_sx_footer->set_name('Simplex Footer');
$gcb_sx_footer->set_type($gcb_template_type);
$gcb_sx_footer->set_owner($admin_user->id);
$gcb_sx_footer->set_description('Custom footer section template for Simplex Theme');
$gcb_sx_footer->set_content($txt);
$gcb_sx_footer->save();
$simplex_theme->add_template($gcb_sx_footer);
//
// Stylesheets
//
$css_list = array();
verbose_msg(ilang('install_stylesheets'));

$txt = <<<EOT
/*********************************************
Sample stylesheet for mobile and small screen handheld devices

Just a simple layout suitable for smaller screens with less
styling cabapilities and minimal css

Note: If you dont want to support mobile devices you can
safely remove this stylesheet.
*********************************************/
/* remove all padding and margins and set width to 100%. This should be default for handheld devices but its good to set these explicitly */
body {
margin:0;
padding:0;
width:100%;
}

/* hide accessibility noprint and definition */
.accessibility,
.noprint,
dfn {
display:none;
}

/* dont want to download image for header so just set bg color */
div#header,
div#footer {
background-color: #385C72;
color: #fff;
text-align:center;
}

/* text colors for header and footer */
div#header a,
div#footer a {
color: #fff;
}

/* this doesnt look as nice, but takes less space */
div#menu_vert ul li,
div#menu_horiz ul li {
display:inline;
}

/* small border at the bottom to have some indicator */
div#menu_vert ul,
div#menu_horiz ul {
border-bottom:1px solid #fff;
}

/* save some space */
div.breadcrumbs {
display:none;
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Handheld');
$css->set_description('Stylesheet for older mobile devices');
$css->set_content($txt);
$css->set_media_types('handheld');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/*
Sections that are hidden when printing the page. We only want the content printed.
*/


body {
color: #000 !important; /* we want everything in black */
background-color:#fff !important; /* on white background */
font-family:arial; /* arial is nice to read ;) */
border:0 !important; /* no borders thanks */
}

/* This affects every tag */
* {
border:0 !important; /* again no borders on printouts */
}

/*
no need for accessibility on printout.
Mark all your elements in content you
dont want to get printed with class="noprint"
*/
.accessibility,
.noprint
 {
display:none !important;
}

/*
remove all width constraints from content area
*/
div#content,
div#main {
display:block !important;
width:100% !important;
border:0 !important;
padding:1em !important;
}

/* hide everything else! */
div#header,
div#header h1 a,
div.breadcrumbs,
div#search,
div#footer,
div#menu_vert,
div#news,
div.noprint,
div.right49,
div.left49,
div#sidebar  {
   display: none !important;
}

img {
float:none; /* this makes images cause a pagebreak if it doesnt fit on the page */
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Print');
$css->set_description('Default stylesheet for print devices');
$css->set_content($txt);
$css->set_media_types('print');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/* accessibility */
/* menu links accesskeys */
span.accesskey {
	text-decoration: none;
}
/* accessibility divs are hidden by default, text, screenreaders and such will show these */
.accessibility, hr {
/* position set so the rest can be set out side of visual browser viewport */
	position: absolute;
/* takes it out top side */
	top: -999em;
/* takes it out left side */
	left: -999em;
}
/* definition tags are also hidden, these are also used for accessibility menu links */
dfn {
	position: absolute;
	left: -1000px;
	top: -1000px;
	width: 0;
	height: 0;
	overflow: hidden;
	display: inline;
}
/* end accessibility */
/* wiki style external links */
/* external links will have "(external link)" text added, lets hide it */
a.external span {
	position: absolute;
	left: -5000px;
	width: 4000px;
}
a.external {
/* make some room for the image, css shorthand rules, read: first top padding 0 then right padding 12px then bottom then right */
	padding: 0 12px 0 0;
}
/* colors for external links */
a.external:link {
	color: #18507C;
/* background image for the link to show wiki style arrow */
	background: url([[root_url]]/uploads/NCleanBlue/external.gif) no-repeat 100% -100px;
}
a.external:visited {
	color: #18507C;
/* a different color can be used for visited external links */
/* Set the last 0 to -100px to use that part of the external.gif image for different color for active links external.gif is actually 300px tall, we can use different positions of the image to simulate rollover image changes.*/
	background: url([[root_url]]/uploads/NCleanBlue/external.gif) no-repeat 100% -100px;
}
a.external:hover {
	color: #18507C;
/* Set the last 0 to -200px to use that part of the external.gif image for different color on hover */
	background: url([[root_url]]/uploads/NCleanBlue/external.gif) no-repeat 100% 0;
	background-color: inherit;
}
/* end wiki style external links */
/* clearing */
/* clearfix is a hack for divs that hold floated elements. it will force the holding div to span all the way down to last floated item. We strongly recommend against using this as it is a hack and might not render correctly but it is included here for convenience. Do not edit if you dont know what you are doing*/
.clearfix:after {
	content: ".";
	display: block;
	height: 0;
	clear: both;
	visibility: hidden;
}
.clear {
	height: 0;
	clear: both;
	width: 90%;
	visibility: hidden;
}
#main .clear {
	height: 0;
	clear: right;
	width: 90%;
	visibility: hidden;
}
* html>body .clearfix {
	display: inline-block;
	width: 100%;
}
* html .clear {
/* Hides from IE-mac \\*/
	height: 1%;
	clear: right;
	width: 90%;
/* End hide from IE-mac */
}
/* end clearing */
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Accessibility and cross-browser tools');
$css->set_description('Accessibility and cross-browser CSS rules attached to multiple Themes');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/* browsers interpret margin and padding a little differently, we'll remove all default padding and margins and set them later on */
* {
	margin: 0;
	padding: 0;
}
/*Set initial font styles*/
body {
	text-align: left;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 75.01%;
	line-height: 1em;
}
/*set font size for all divs, this overrides some body rules*/
div {
	font-size: 1em;
}
/*if img is inside "a" it would have borders, we don't want that*/
img {
	border: 0;
}
/*default link styles*/
a, a:link a:active {
/* set all links to have underline */
	text-decoration: underline;
/* css validation will give a warning if color is set without background color. this will explicitly tell this element to inherit bg colour from parent element */
	background-color: inherit;
/* this is a bluish color, you change this for all default link colors */
	color: #18507C;
}
a:visited {
/* keeps the underline */
	text-decoration: underline;
	background-color: inherit;
/* a different color is used for visited links */
	color: #18507C;
}
a:hover {
/* remove underline on hover */
	text-decoration: none;
	background-color: inherit;
/* using a different color makes the hover obvious */
	color: #385C72;
}
/*****************basic layout *****************/
body {
	margin: 0;
	padding: 0;
/* default text color for entire site*/
	color: #333;
/* you can set your own image and background color here */
	background: #f4f4f4 url([[root_url]]/uploads/ngrey/body.png) repeat-x left top;
}
div#pagewrapper {
/* min max width, IE wont understand these, so we will use java script magic in the <head> */
	max-width: 99em;
	min-width: 60em;
/* now that width is set this centers wrapper */
	margin: 0 auto;
	background-color: #fefefe;
	color: black;
}
/* header, we will hide h1 a text and replace it with an image, we assign a height for it so the image wont cut off */
div#header {
/* adjust according your image size */
	height: 100px;
	margin: 0;
	padding: 0;
/* you can set your own image here, will go behind h1 a image */
	background: #f4f4f4 url([[root_url]]/uploads/ngrey/bg_banner.png) repeat-x left top;
/* border just the bottom */
	border-bottom: 1px solid #D9E2E6;
}
div#header h1 a {
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/logoCMS.png) no-repeat left top;
/* this will make the "a" link a solid shape */
	display: block;
/* adjust according your image size */
	height: 100px;
/* this hides the text */
	text-indent: -999em;
/* old firefox would have shown underline for the link, this explicitly hides it */
	text-decoration: none;
}
div#header h1 {
	margin: 0;
	padding: 0;
/*these keep IE6 from pushing the header to more than the set size*/
	line-height: 0;
	font-size: 0;
/* this will keep IE6 from flickering on hover */
	background: url([[root_url]]/uploads/ngrey/logoCMS.png) no-repeat left top;
}
div#header h2 {
/* this is where the site name is */
	float: right;
	line-height: 1.2em;
/* this keeps IE6 from not showing the whole text */
	font-size: 1.5em;
/* keeps the size uniform */
	margin: 35px 65px 0px 0px;
/* adjust according your text size */
	color: #f4f4f4;
}
div.crbk {
/* sets all to 0 */
	margin: 0;
	padding: 0;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainrtup.gif) no-repeat right bottom;
}
div.breadcrumbs {
/* CSS short hand rule first value is top then right, bottom and left */
	padding: 1em 0em 1em 1em;
/* its good to set font sizes to be relative, this way viewer can change his/her font size */
	font-size: 90%;
/* css shorthand rule will be opened to be "0px 0px 0px 0px" */
	margin: 0px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainleftup.gif) no-repeat left bottom;
}
div.breadcrumbs span.lastitem {
	font-weight: bold;
}
div#search {
/* position for the search box */
	float: right;
/* enough width for the search input box */
	width: 27em;
	text-align: right;
	padding: 0.5em 0 0.2em 0;
	margin: 0 1em;
}
/* a class for Submit button for the search input box */
input.search-button {
	border: none;
	height: 22px;
	width: 53px;
	margin-left: 5px;
	padding: 0px 2px 2px 0px;
/* makes the hover cursor show, you can set your own cursor here */
	cursor: pointer;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/search.gif) no-repeat center center;
}
div#content {
/* some air above and under menu and content */
	margin: 1.5em auto 2em 0;
	padding: 0px;
}
/* this gets all the outside calls that were used on the div#main before  */
div.back1 {
/* this will give room for sidebar to be on the left side, make sure this number is bigger than sidebar width */
	margin-left: 29%;
/* and some air on the right */
	margin-right: 2%;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainrt1.gif) no-repeat right top;
}
/* this is an IE6 hack, you may see these through out the CSS */
* html div.back1 {
/* unlike other browser IE6 needs float:right and a width */
	float: right;
	width: 69%;
/* and we take this out or it will stop at the bottom  */
	margin-left: 0%;
/* and some air on the right */
	margin-right: 10px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainrt1.gif) no-repeat right top;
}
div.back2 {
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainleft1.gif) no-repeat left top;
}
div.back3 {
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/wbtmleft.gif) no-repeat left bottom;
}
div#main {
/* this is the last inside div so we set the space inside it to keep all content away from the edges of images/box */
	padding: 10px 15px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/rtup.gif) no-repeat right bottom;
}
div.back #main {
/* this is the last inside div so we set the space inside it to keep all content away from the edges of images/box */
	padding: 10px 30px 1px 15px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/wbtmleft.gif) no-repeat left bottom;
}
div.back {
/* this will give room for sidebar to be on the left side, make sure this space is bigger than sidebar width */
	margin-left: 29%;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/wtopleft.gif) no-repeat left top;
}
div#sidebar {
/* set sidebar left. Change to right, float: right; instead, but you will need to change the margins. */
	float: left;
/* sidebar width, if you change this change div.back and/or div.back1 margins */
	width: 26%;
/* FIX IE double margin bug */
	display: inline;
/* the 20px is on the bottom, insures space above footer if longer than content */
	margin: 0px 0px 20px;
	padding: 0px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainrt1.gif) no-repeat right top;
}
div#sidebara {
	padding: 13px 15px 3px 0px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainrtup.gif) no-repeat right bottom;
}
div#sidebarb {
	padding: 10px 10px 1px 0px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainrtup.gif) no-repeat right bottom;
}
div.footback {
/* keep footer below content and menu */
	clear: both;
/* this sets 10px on right to let the right image show, the balance 10px left on next div */
	padding: 0px 10px 0px 0px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/wfootrt.gif) no-repeat right top;
}
div#footer {
/* this sets 10px on left to balance 10px right on last div */
	padding: 0px 0px 0px 10px;
/* color of text, the link color is set below */
	color: #595959;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/wtopleft.gif) no-repeat left top;
}
div.leftfoot {
	float: left;
	width: 30%;
	margin-left: 20px
}
div#footer p {
/* sets different font size from default */
	font-size: 0.8em;
/* some air for footer */
	padding: 1.5em;
/* centered text */
	text-align: center;
	margin: 0;
}
div#footer p a {
/* footer link would be same color as default we want it same as footer text */
	color: #595959;
}
/* as we hid all hr for accessibility we create new hr with div class="hr" element */
div.hr {
	height: 1px;
	padding: 1em;
	border-bottom: 1px dotted black;
	margin: 1em;
}
/* relational links under content */
div.left49 {
/* combined percentages of left+right equaling 100%  might lead to rounding error on some browser */
	width: 70%;
}
div.right49 {
	float: right;
	width: 29%;
/* set right to keep text on right */
	text-align: right;
}
/********************CONTENT STYLING*********************/
/* HEADINGS */
div#content h1 {
/* font size for h1 */
	font-size: 2em;
	line-height: 1em;
	margin: 0;
}
div#content h2 {
	color: #294B5F;
/* font size for h2 the higher the h number the smaller the font size, most times */
	font-size: 1.5em;
	text-align: left;
/* some air around the text */
	padding-left: 0.5em;
	padding-bottom: 1px;
/* set borders around header */
	border-bottom: 1px solid #899092;
	border-left: 1.1em solid #899092;
/* a larder than h1 line height */
	line-height: 1.5em;
/* and some air under the border */
	margin: 0 0 0.5em 0;
}
div#content h3 {
	color: #294B5F;
	font-size: 1.3em;
	line-height: 1.3em;
	margin: 0 0 0.5em 0;
}
div#content h4 {
	color: #294B5F;
	font-size: 1.2em;
	line-height: 1.3em;
	margin: 0 0 0.25em 0;
}
div#content h5 {
	color: #294B5F;
	font-size: 1.1em;
	line-height: 1.3em;
	margin: 0 0 0.25em 0;
}
h6 {
	color: #294B5F;
	font-size: 1em;
	line-height: 1.3em;
	margin: 0 0 0.25em 0;
}
/* END HEADINGS */
/* TEXT */
p {
/* default p font size, this is set different in some other divs */
	font-size: 1em;
/* some air around p elements */
	margin: 0 0 1.5em 0;
	line-height: 1.4em;
	padding: 0;
}
blockquote {
	border-left: 10px solid #ddd;
	margin-left: 10px;
}
strong, b {
/* explicit setting for these */
	font-weight: bold;
}
em, i {
/* explicit setting for these */
	font-style: italic;
}
/* Wrapping text in <code> tags. Makes CSS not validate */
code, pre {
/* css-3 */
	white-space: pre-wrap;
/* Mozilla, since 1999 */
	white-space: -moz-pre-wrap;
/* Opera 4-6 */
	white-space: -pre-wrap;
/* Opera 7 */
	white-space: -o-pre-wrap;
/* Internet Explorer 5.5+ */
	word-wrap: break-word;
	font-family: "Courier New", Courier, monospace;
	font-size: 1em;
}
pre {
/* black border for pre blocks */
	border: 1px solid #000;
/* set different from surroundings to stand out */
	background-color: #ddd;
	margin: 0 1em 1em 1em;
	padding: 0.5em;
	line-height: 1.5em;
	font-size: 90%;
}
/* Separating the divs on the template explanation page */
div.templatecode {
	margin: 0 0 2.5em;
}
/* END TEXT */
/* LISTS */
/* lists in content need some margins to look nice */
div#main ul,
div#main ol,
div#main dl {
	font-size: 1.0em;
	line-height: 1.4em;
	margin: 0 0 1.5em 0;
}
div#main ul li,
div#main ol li {
	margin: 0 0 0.25em 3em;
}
/* definition lists topics on bold */
div#main dl {
	margin-bottom: 2em;
	padding-bottom: 1em;
	border-bottom: 1px solid #c0c0c0;
}
div#main dl dt {
	font-weight: bold;
	margin: 0 0 0 1em;
}
div#main dl dd {
	margin: 0 0 1em 1em;
}
/* END LISTS */
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Layout Left sidebar + 1 column');
$css->set_description('CSS rules used for Layout Left sidebar + 1 column Design');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/* Vertical menu for the CMS CSS Menu Module */
/* by Alexander Endresen and mark and Nuno */
/* The wrapper determines the width of the menu elements */
#menuwrapper {
/* just smaller than it\'s containing div */
	width: 95%;
	margin-left: 0px;
/* room at bottom */
	margin-bottom: 10px;
}
/* Unless you know what you do, do not touch this */
#primary-nav, #primary-nav ul {
/* remove any default bullets */
	list-style: none;
	margin: 0px;
	padding: 0px;
/* make sure it fills out */
	width: 100%;
/* just a little bump */
	margin-left: 1px;
}
#primary-nav ul {
/* make the ul stay in place so when we hover it lets the drops go over the content below else it will push everything below out of the way */
	position: absolute;
/* just a little bump down for second level ul */
	top: 5px;
/* keeps the left side of this ul on the right side of the one it came out of */
	left: 100%;
/* keeps it hidden till hover event */
	display: none;
}
#primary-nav ul ul {
/* no bump down for third level ul */
	top: 0px;
}
#primary-nav li {
/* negative bottom margin pulls them together, images look like one border between */
	margin-bottom: -1px;
/* keeps within it\'s container */
	position: relative;
/* bottom padding pushes \"a\" up enough to show our image */
	padding: 0px 0px 4px 0px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/liup.gif) no-repeat right bottom;
}
#primary-nav li li {
/* you can set your width here, if no width or set auto it will only be as wide as the text in it  */
	width: 220px;
	padding: 0px;
/* removes first level li image */
	background-image: none;
}
/* Styling the basic apperance of the menu \"a\" elements */
ul#primary-nav li a {
/* specific font size, this could be larger or smaller than default font size */
	font-size: 1em;
/* make sure we keep the font normal */
	font-weight: normal;
/* set default link colors */
	color: #595959;
/* pushes li out from the text, sort of like making links a certain size, if you give them a set width and/or height you may limit you ability to have as much text as you need */
	padding: 0.8em 0.5em 0.5em 0.5em;
/* makes it hold a shape */
	display: block;
/* removes underline from default link setting */
	text-decoration: none;
/* you can set your own image here this is tall enough to cover text heavy links */
	background: url([[root_url]]/uploads/ngrey/libk.gif) no-repeat right top;
}
ul#primary-nav a span {
/* makes it hold a shape */
	display: block;
/* pushes text to right */
	padding-left: 1.5em;
}
ul#primary-nav li a:hover {
/* stops image flicker in some browsers */
	background: url([[root_url]]/uploads/ngrey/libk.gif) no-repeat right top;
/* changes text color on hover */
	color: #899092;
}
ul#primary-nav li li a:hover {
/* you can set your own image here, second level \"a\" */
	background:  url([[root_url]]/uploads/ngrey/darknav.png) repeat-x left center;
/* contrast color to image behind it */
	color: #FFF;
}
ul#primary-nav li a.menuactive {
/* black and bold to set it off from non active */
	color: #000;
	font-weight: bold;
}
ul#primary-nav li li a.menuactive {
/* contrast color to image behind it, set below */
	color: #FFF;
/* not bold as text color and image behind it set it off from non active */
	font-weight: normal;
}
ul#primary-nav li ul a {
/* insures alignment */
	text-align: left;
	margin: 0px;
/* relative to it\'s container */
	position: relative;
/* more padding to left than default */
	padding: 6px 3px 6px 15px;
	font-weight: normal;
/* darker than first level \"a\" */
	color: #000;
/* removes any borders that may have been set in first level */
	border-top: 0 none;
	border-right: 0 none;
	border-left: 0 none;
/* removes image set in first level \"a\" */
	background: none;
}
ul#primary-nav li ul {
/* very lite grey color, by now you should know what the rest mean */
	background: #F3F5F5;
	margin: 0px;
	padding: 0px;
	position: absolute;
	width: auto;
	height: auto;
	display: none;
	position: absolute;
	z-index: 999;
	border-top: 1px solid #FFFFFF;
	border-bottom: 1px solid #374B51;
	/*Info: The opacity property is  CSS3, however, will be valid just in CSS 3.1) http://jigsaw.w3.org/css-validator2) More Options chose CSS3 3) is full validate;)*/
	opacity: 0.95;
/* CSS 3 */
}
/* Fixes IE7 bug */
#primary-nav li, #primary-nav li.menuparent {
	min-height: 1em;
}
/* Styling the basic apperance of the second level active page elements (shows what page in the menu is being displayed) */
#primary-nav li li.menuactive, #primary-nav li.menuactive.menuparenth li.menuactive {
/* set your image here, dark grey image with white text set above*/
	background:  url([[root_url]]/uploads/ngrey/darknav.png) repeat-x left center;
}
#primary-nav li.menuparent span {
/* padding on left for image */
	padding-left: 1.5em;
/* down arrow to note it has children, left side of text */
	background: url([[root_url]]/uploads/ngrey/active.png) no-repeat left center;
}
#primary-nav li.menuparent:hover li.menuparent span {
/* remove left padding as image is on right side of text */
	padding-left: 0;
/* right arrow to note it has children, right side of text */
	background: url([[root_url]]/uploads/ngrey/parent.png) no-repeat right center;
}
#primary-nav li.menuparenth li.menuparent span,
#primary-nav li.menuparenth li.menuparenth span {
/* same as above but this is for IE6, gif image as it can\'t handle transparent png */
	padding-left: 0;
	background: url([[root_url]]/uploads/ngrey/parent.gif) no-repeat right center;
}
#primary-nav li.menuparenth span,
#primary-nav li.menuparent:hover span,
#primary-nav li.menuparent.menuactive span,
#primary-nav li.menuparent.menuactiveh span, {
/* right arrow to note hover */
	background: url([[root_url]]/uploads/ngrey/parent.png) no-repeat left center;
}
#primary-nav li li span,
#primary-nav li.menuparent li span,
#primary-nav li.menuparent:hover li span,
#primary-nav li.menuparenth li span,
#primary-nav li.menuparenth li.menuparenth li span,
#primary-nav li.menuparent li.menuparent li span,
#primary-nav li.menuparent li.menuparent:hover li span  {
/* removes any images set above unless it\'s a parent or active parent */
	background:  none;
/* removes padding that is used for arrows */
	padding-left: 0px;
}
/* IE6 flicker fix */
#primary-nav li.menuh,
#primary-nav li.mnuparenth,
#primary-nav li.mnuactiveh {
	background: url([[root_url]]/uploads/ngrey/libk.gif) no-repeat right top;
	color: #899092;
}
#primary-nav li:hover li a {
/* removes any images set above unless it\'s a parent or active parent */
	background:  none;
	color: #000;
}
/* The magic - set to work for up to a 3 level menu, but can be increased unlimited, for fourth level add
#primary-nav li:hover ul ul ul,
#primary-nav li.menuparenth ul ul ul,
*/
#primary-nav ul,
#primary-nav li:hover ul,
#primary-nav li:hover ul ul,
#primary-nav li.menuparenth ul,
#primary-nav li.menuparenth ul ul {
	display: none;
}
/* for fourth level add
#primary-nav ul ul ul li:hover ul,
#primary-nav ul ul ul li.menuparenth ul,
*/
#primary-nav li:hover ul,
#primary-nav ul li:hover ul,
#primary-nav ul ul li:hover ul,
#primary-nav li.menuparenth ul,
#primary-nav ul li.menuparenth ul,
#primary-nav ul ul li.menuparenth ul {
	display: block;
}
/* IE Hack, will cause the css to not validate */
#primary-nav li,
#primary-nav li.menuparenth {
	_float: left;
	_height: 1%;
}
#primary-nav li a {
	_height: 1%;
}
/* BIG NOTE: I didn\'t do anything to these 2, never tested */
#primary-nav li.sectionheader {
	border-left: 1px solid #006699;
	border-top: 1px solid #006699;
	font-size: 130%;
	font-weight: bold;
	padding: 1.5em 0 0.8em 0.5em;
	background-color: #fff;
	margin: 0;
	width: 100%;
}
/* separator */
#primary-nav li hr.separator {
	display: block;
	height: 0.5em;
	color: #abb0b6;
	background-color: #abb0b6;
	width: 100%;
	border: 0;
	margin: 0;
	padding: 0;
	border-top: 1px solid #006699;
	border-right: 1px solid #006699;
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Navigation CSSMenu - Vertical');
$css->set_description('Navigation CSS rules used in CSSMenu left + 1 column Design');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/* by Alexander Endresen and mark and Nuno */
#menu_vert {
/* no margin/padding so it fills the whole div */
	margin: 0;
	padding: 0;
}
.clearb {
/* needed for some browsers */
	clear: both;
}
#menuwrapper {
/* set the background color for the menu here */
	background-color: #243135;
/* IE6 Hack */
	height: 1%;
	width: auto;
/* one border at the top */
	border-top: 1px solid #3F565C;
	margin: 0;
	padding: 0;
}
ul#primary-nav, ul#primary-nav ul {
/* remove any default bullets */
	list-style-type: none;
	margin: 0;
	padding: 0;
}
ul#primary-nav {
/* pushes the menu div up to give room above for background color to show */
	padding-top: 10px;
/* keeps the first menu item off the left side */
	padding-left: 10px;
}
ul#primary-nav ul {
/* make the ul stay in place so when we hover it lets the drops go over the content below else it will push everything below out of the way */
	position: absolute;
/* top being the bottom of the li it comes out of */
	top: auto;
/* keeps it hidden till hover event */
	display: none;
/* same size but different color for each border */
	border-top: 1px solid #C8D3D7;
	border-right: 1px solid #C8D3D7;
	border-bottom: 1px solid #ADC0C7;
	border-left: 1px solid #A5B9C0;
}
ul#primary-nav ul ul {
/* now we move the next level ul down from the top a little for distinction */
	margin-top: 1px;
/* pull it in on the left, helps us not lose the hover effect when going to next level */
	margin-left: -1px;
/* keeps the left side of this ul on the right side of the one it came out of */
	left: 100%;
/* sets the top of it inline with the li it came out of */
	top: 0px;
}
ul#primary-nav li {
/* floating left will set menu items to line up left to right else they will stack top to bottom */
	float: left;
/* no margin/padding keeps them next to each other, the padding will be in the \"a\" */
	margin: 0px;
	padding: 0px;
}
#primary-nav li li {
/* Set the width of the menu elements at second level. Leaving first level flexible. */
	width: 220px;
/* removes any left margin it may have picked up from the first li */
	margin-left: 0px;
/* keeps them tight to the one above, no missed hovers */
	margin-top: -1px;
/* removes the left float set in first li so these will stack from top down */
	float: none;
/* relative to the ul they are in */
	position: relative;
}
/* set the \"a\" link look here */
ul#primary-nav li a {
/* specific font size, this could be larger or smaller than default font size */
	font-size: 1em;
/* make sure we keep the font normal */
	font-weight: normal;
/* set default link colors */
	color: #fff;
/* pushes out from the text, sort of like making links a certain size, if you give them a set width and/or height you may limit you ability to have as much text as you need */
	padding: 12px 15px 15px;
	display: block;
/* sets no underline on links */
	text-decoration: none;
}
ul#primary-nav li a:hover {
/* kind of obvious */
	background-color: transparent;
}
ul#primary-nav li li a:hover {
/* this is set to #000, black, below so hover will be white text */
	color: #FFF;
}
ul#primary-nav li a.menuactive {
	color: #000;
/* bold to set it off from non active */
	font-weight: bold;
/* set your image here */
	background:  url([[root_url]]/uploads/ngrey/nav.png) repeat-x left 0px;
}
ul#primary-nav li a.menuactive:hover {
	color: #000;
/* keep it the same */
	font-weight: bold;
}
#primary-nav li li a.menuparent span {
/* makes it hold a shape */
	display: block;
/* set your image here, right arrow, 98% over from the left, 100% or \'right\' puts it to far */
	background:  url([[root_url]]/uploads/ngrey/parent.png) no-repeat 98% center;
}
/* gif for IE6, as it can\'t handle transparent png */
* html #primary-nav li li a.menuparent span {
/* set your image here, right arrow, 98% over from the left, 100% or \'right\' puts it to far */
	background:  url([[root_url]]/uploads/ngrey/parent.gif) no-repeat 98% center;
}
ul#primary-nav li ul a {
/* insures alignment */
	text-align: left;
	margin: 0px;
/* keeps it relative to it\'s container */
	position: relative;
/* less padding than first level no need for large links here */
	padding: 6px 3px 6px 15px;
/* if first level is set to bold this will reset this level */
	font-weight: normal;
/* first level is #FFF/white, we need black to contrast with light background */
	color: #000;
	border-top: 0 none;
	border-right: 0 none;
	border-left: 0 none;
}
ul#primary-nav li ul {
/* very lite grey color, by now you should know what the rest mean */
	background: #F3F5F5;
	margin: 0px;
	padding: 0px;
	position: absolute;
	width: auto;
	height: auto;
	display: none;
	position: absolute;
	z-index: 999;
	border-top: 1px solid #FFFFFF;
	border-bottom: 1px solid #374B51;
/*Info: The opacity property is  CSS3, however, will be valid just in CSS 3.1) http://jigsaw.w3.org/css-validator2) More Options chose CSS3 3) is full validate;)*/
	opacity: 0.95;
/* CSS 3 */
}
ul#primary-nav li ul ul {
/*Info: The opacity property is  CSS3, however, will be valid just in CSS 3.1) http://jigsaw.w3.org/css-validator2) More Options chose CSS3 3) is full validate;)*/
	opacity: 95;
/* CSS 3 */
}
/* Styling the appearance of menu items on hover */
#primary-nav li:hover,
#primary-nav li.menuh,
#primary-nav li.menuparenth,
#primary-nav li.menuactiveh {
/* set your image here, dark grey image */
	background:  url([[root_url]]/uploads/ngrey/darknav.png) repeat-x left center;
	color: #000
}
/* The magic - set to work for up to a 3 level menu, but can be increased unlimited, for fourth level add
#primary-nav li:hover ul ul ul,
#primary-nav li.menuparenth ul ul ul,
*/
#primary-nav ul,
#primary-nav li:hover ul,
#primary-nav li:hover ul ul,
#primary-nav li.menuparenth ul,
#primary-nav li.menuparenth ul ul {
	display: none;
}
/* for fourth level add
#primary-nav ul ul ul li:hover ul,
#primary-nav ul ul ul li.menuparenth ul,
*/
#primary-nav li:hover ul,
#primary-nav ul li:hover ul,
#primary-nav ul ul li:hover ul,
#primary-nav li.menuparenth ul,
#primary-nav ul li.menuparenth ul,
#primary-nav ul ul li.menuparenth ul {
	display: block;
}
/* IE6 Hacks */
#primary-nav li li {
	float: left;
	clear: both;
}
#primary-nav li li a {
	height: 1%;
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Navigation CSSMenu - Horizontal');
$css->set_description('Navigation CSS rules used in CSSMenu top + 2 columns Design');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
div#news {
/* margin for the entire div surrounding the news items */
	margin: 2em 0 1em 1em;
/* border set here */
	border: 1px solid #909799;
/* sets it off from surroundings */
	background: #f5f5f5;
}
div#news h2 {
	line-height: 2em;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/darknav.png) repeat-x left center;
	color: #f5f5f5;
	border: none
}
.NewsSummary {
/* padding for the news article summary */
	padding: 0.5em 0.5em 1em;
/* margin to the bottom of the news article summary */
	margin: 0 0.5em 1em 0.5em;
	border-bottom: 1px solid #ccc;
}
.NewsSummaryPostdate {
/* smaller than default text size */
	font-size: 90%;
/* bold to set it off from text */
	font-weight: bold;
}
.NewsSummaryLink {
/* bold to set it off from text */
	font-weight: bold;
/* little more room at top */
	padding-top: 0.2em;
}
.NewsSummaryCategory {
/* italic to set it off from text */
	font-style: italic;
	margin: 5px 0;
}
.NewsSummaryAuthor {
/* italic to set it off from text */
	font-style: italic;
	padding-bottom: 0.5em;
}
.NewsSummarySummary, .NewsSummaryContent {
/* larger than default text */
	line-height: 140%;
}
.NewsSummaryMorelink {
	padding-top: 0.5em;
}
#NewsPostDetailDate {
/* smaller text */
	font-size: 90%;
	margin-bottom: 5px;
/* bold to set it off from text */
	font-weight: bold;
}
#NewsPostDetailSummary {
/* larger than default text */
	line-height: 150%;
}
#NewsPostDetailCategory {
/* italic to set it off from text */
	font-style: italic;
	border-top: 1px solid #ccc;
	margin-top: 0.5em;
	padding: 0.2em 0;
}
#NewsPostDetailContent {
	margin-bottom: 15px;
/* larger than default text */
	line-height: 150%;
}
#NewsPostDetailAuthor {
	padding-bottom: 1.5em;
/* italic to set it off from text */
	font-style: italic;
}
/* more divs, left unstyled, just so you know the IDs of them */
#NewsPostDetailTitle {
}
#NewsPostDetailHorizRule {
}
#NewsPostDetailPrintLink {
}
#NewsPostDetailReturnLink {
}
div#news ul li {
	padding: 2px 2px 2px 5px;
	margin-left: 20px;
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Module News');
$css->set_description('Default News module CSS rules used in multiple Designs');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/********************MENU*********************/
/* hack for IE6 */
* html div#menu_horiz {
/* hide ie/mac \\*/
	height: 1%;
/* end hide */
}
div#menu_horiz {
/* background color for the entire menu row */
	background-color: #243135;
/* insure full width */
	width: 100%;
/* set height */
	height: 49px;
	margin: 0;
}
div#menu_horiz ul {
/* remove any default bullets */
	list-style-type: none;
	margin: 0;
/* pushes the menu div up to give room above for background color to show */
	padding-top: 10px;
/* keeps the first menu item off the left side */
	padding-left: 10px;
}
/* menu list items */
div#menu_horiz li {
/* makes the list horizontal */
	float: left;
/* remove any default bullets */
	list-style: none;
/* still no margin */
	margin: 0;
}
/* the links, that is each list item */
div#menu_horiz a, div#menu_horiz h3 span, div#menu_horiz .sectionheader span {
/* pushes li out from the text, sort of like making links a certain size, if you give them a set width and/or height you may limit you ability to have as much text as you need */
	padding: 12px 15px 15px 0px;
/* still no margin */
	margin: 0;
/* removes default underline */
	text-decoration: none;
/* default link color */
	color: #FFF;
/* makes it hold a shape, IE has problems with this, fixed above */
	display: block;
}
/* hover state for links */
div#menu_horiz li a:hover {;
/* set your image here, dark grey image with white text set above*/
	background:  url([[root_url]]/uploads/ngrey/nav.png) repeat-x left -50px;
}
div#menu_horiz a span {
/* compensates for no left padding on the "a" */
	padding-left: 15px;
}
div#menu_horiz li.parent a span {
/* no left padding on the "a" we can set it here, it lets us use the span for an image */
	padding-left: 20px;
/* set your image here, down arrow to note it has children, left side of text */
	background: url([[root_url]]/uploads/ngrey/active.gif) no-repeat 0.3em center;
}
div#menu_horiz li.parent a:hover span {
	padding-left: 20px;
/* hover replaces default with right arrow image */
	background: url([[root_url]]/uploads/ngrey/parent.gif) no-repeat 0.3em center;
}
div#menu_horiz li.menuactive a span {
	padding-left: 20px;
/* menuactive replaces default with right arrow image */
	background: url([[root_url]]/uploads/ngrey/parent.gif) no-repeat 0.5em center;
	color: #000;
}
div#menu_horiz li.currentpage h3 span {
	padding-left: 12px;
/* menuactive replaces default with right arrow image */
	background: url([[root_url]]/uploads/ngrey/nav.png) repeat-x left 0px;
	color: #000;
}
div#menu_horiz .sectionheader span {
/* compensates for no left padding on the "sectionheader" */
	padding-left: 15px;
}
/* active parent, that is the first level parent of a child page that is the current page */
div#menu_horiz li.menuactive, div#menu_horiz li.menuactive a:hover {
/* set your image here, light image with #000/black text set below*/
	background:  url([[root_url]]/uploads/ngrey/nav.png) repeat-x left 0px;
	color: #000;
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Navigation Simple - Horizontal');
$css->set_description('Navigation CSS rules used in Top simple navigation + left subnavigation + 1 column and Left simple navigation + 1 column Designs');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/* browsers interpret margin and padding a little differently, we'll remove all default padding and margins and set them later on */
* {
	margin: 0;
	padding: 0;
}
/*Set initial font styles*/
body {
	text-align: left;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 75.01%;
	line-height: 1em;
}
/*set font size for all divs, this overrides some body rules*/
div {
	font-size: 1em;
}
/*if img is inside "a" it would have borders, we don't want that*/
img {
	border: 0;
}
/*default link styles*/
/* set all links to have underline and bluish color */
a, a:link a:active {
	text-decoration: underline;
/* css validation will give a warning if color is set without background color. this will explicitly tell this element to inherit bg colour from parent element */
	background-color: inherit;
	color: #18507C;
}
a:visited {
	text-decoration: underline;
	background-color: inherit;
	color: #18507C;
/* a different color can be used for visited links */
}
/* remove underline on hover and change color */
a:hover {
	text-decoration: none;
	background-color: inherit;
	color: #385C72;
}
/*****************basic layout *****************/
body {
	margin: 0;
	padding: 0;
/* default text color for entire site*/
	color: #333;
/* you can set your own image and background color here */
	background: #f4f4f4 url([[root_url]]/uploads/ngrey/body.png) repeat-x left top;
}
div#pagewrapper {
/* min max width, IE wont understand these, so we will use java script magic in the <head> */
	max-width: 99em;
	min-width: 60em;
/* now that width is set this centers wrapper */
	margin: 0 auto;
	background-color: #fefefe;
	color: black;
}
/* header, we will hide h1 a text and replace it with an image, we assign a height for it so the image wont cut off */
div#header {
/* adjust according your image size */
	height: 100px;
	margin: 0;
	padding: 0;
	/* you can set your own image here, will go behind h1 a image */
	background: #f4f4f4 url([[root_url]]/uploads/ngrey/bg_banner.png) repeat-x left top;
/* border just the bottom */
	border-bottom: 1px solid #D9E2E6;
}
div#header h1 a {
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/logoCMS.png) no-repeat left top;
/* this will make the "a" link a solid shape */
	display: block;
/* adjust according your image size */
	height: 100px;
/* this hides the text */
	text-indent: -999em;
/* old firefox would have shown underline for the link, this explicitly hides it */
	text-decoration: none;
}
div#header h1 {
	margin: 0;
	padding: 0;
/*these keep IE6 from pushing the header to more than the set size*/
	line-height: 0;
	font-size: 0;
/* this will keep IE6 from flickering on hover */
	background: url([[root_url]]/uploads/ngrey/logoCMS.png) no-repeat left top;
}
div#header h2 {
/* this is where the site name is */
	float: right;
	line-height: 1.2em;
/* this keeps IE6 from not showing the whole text */
	font-size: 1.5em;
/* keeps the size uniform */
	margin: 35px 65px 0px 0px;
/* adjust according your text size */
	color: #f4f4f4;
}
div.crbk {
/* sets all to 0 */
	margin: 0;
	padding: 0;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainrtup.gif) no-repeat right bottom;
}
div.breadcrumbs {
/* CSS short hand rule first value is top then right, bottom and left */
	padding: 1em 0em 1em 1em;
/* its good to set font sizes to be relative, this way viewer can change his/her font size */
	font-size: 90%;
/* css shorthand rule will be opened to be "0px 0px 0px 0px" */
	margin: 0px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainleftup.gif) no-repeat left bottom;
}
div.breadcrumbs span.lastitem {
	font-weight: bold;
}
div#search {
/* position for the search box */
	float: right;
/* enough width for the search input box */
	width: 27em;
	text-align: right;
	padding: 0.5em 0 0.2em 0;
	margin: 0 1em;
}
/* a class for Submit button for the search input box */
input.search-button {
	border: none;
	height: 22px;
	width: 53px;
	margin-left: 5px;
	padding: 0px 2px 2px 0px;
/* makes the hover cursor show, you can set your own cursor here */
	cursor: pointer;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/search.gif) no-repeat center center;
}
div#content {
/* some air above and under menu and content */
	margin: 1.5em auto 2em 0;
	padding: 0px;
}
/* this gets all the outside calls that were used on the div#main before  */
div.back1 {
/* this will give room for sidebar to be on the left side, make sure this number is bigger than sidebar width */
	margin-left: 29%;
/* and some air on the right */
	margin-right: 2%;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainrt1.gif) no-repeat right top;
}
/* this is an IE6 hack, you may see these through out the CSS */
* html div.back1 {
/* unlike other browser IE6 needs float:right and a width */
	float: right;
	width: 69%;
/* and we take this out or it will stop at the bottom  */
	margin-left: 0%;
/* and some air on the right */
	margin-right: 10px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainrt1.gif) no-repeat right top;
}
div.back2 {
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainleft1.gif) no-repeat left top;
}
div.back3 {
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/wbtmleft.gif) no-repeat left bottom;
}
div#main {
/* this is the last inside div so we set the space inside it to keep all content away from the edges of images/box */
	padding: 10px 15px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/rtup.gif) no-repeat right bottom;
}
div#sidebar {
/* set sidebar left. Change to right, float: right; instead, but you will need to change the margins. */
	float: left;
/* sidebar width, if you change this change div.back and/or div.back1 margins */
	width: 26%;
/* FIX IE double margin bug */
	display: inline;
/* the 20px is on the bottom, insures space above footer if longer than content */
	margin: 0px 0px 20px;
	padding: 0px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/mainrt.gif) no-repeat right top;
}
div#sidebarb {
	padding: 10px 15px 10px 20px;
/* this one is for sidebar with content and no menu */
	background: url([[root_url]]/uploads/ngrey/mainrtup.gif) no-repeat right bottom;
}
div#sidebarb div#news {
/* less margin surrounding the news, sidebarb has enough */
	margin: 2em 0 1em 0em;
}
div#sidebara {
	padding: 10px 15px 15px 0px;
/* this one is for sidebar with menu and no content */
	background: url([[root_url]]/uploads/ngrey/mainrtup.gif) no-repeat right bottom;
}
div.footback {
/* keep footer below content and menu */
	clear: both;
/* this sets 10px on right to let the right image show, the balance 10px left on next div */
	padding: 0px 10px 0px 0px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/wfootrt.gif) no-repeat right top;
}
div#footer {
/* this sets 10px on left to balance 10px right on last div */
	padding: 0px 0px 0px 10px;
/* color of text, the link color is set below */
	color: #595959;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/wtopleft.gif) no-repeat left top;
}
div.leftfoot {
	float: left;
	width: 30%;
	margin-left: 20px
}
div#footer p {
/* sets different font size from default */
	font-size: 0.8em;
/* some air for footer */
	padding: 1.5em;
/* centered text */
	text-align: center;
	margin: 0;
}
div#footer p a {
/* footer link would be same color as default we want it same as footer text */
	color: #595959;
}
/* as we hid all hr for accessibility we create new hr with div class="hr" element */
div.hr {
	height: 1px;
	padding: 1em;
	border-bottom: 1px dotted black;
	margin: 1em;
}
/* relational links under content */
div.left49 {
/* combined percentages of left+right equaling 100%  might lead to rounding error on some browser */
	width: 70%;
}
div.right49 {
	float: right;
	width: 29%;
/* set right to keep text on right */
	text-align: right;
}
/********************CONTENT STYLING*********************/
/* HEADINGS */
div#content h1 {
/* font size for h1 */
	font-size: 2em;
	line-height: 1em;
	margin: 0;
}
div#content h2 {
	color: #294B5F;
/* font size for h2 the higher the h number the smaller the font size, most times */
	font-size: 1.5em;
	text-align: left;
/* some air around the text */
	padding-left: 0.5em;
	padding-bottom: 1px;
/* set borders around header */
	border-bottom: 1px solid #899092;
	border-left: 1.1em solid #899092;
/* a larder than h1 line height */
	line-height: 1.5em;
/* and some air under the border */
	margin: 0 0 0.5em 0;
}
div#content h3 {
	color: #294B5F;
	font-size: 1.3em;
	line-height: 1.3em;
	margin: 0 0 0.5em 0;
}
div#content h4 {
	color: #294B5F;
	font-size: 1.2em;
	line-height: 1.3em;
	margin: 0 0 0.25em 0;
}
div#content h5 {
	color: #294B5F;
	font-size: 1.1em;
	line-height: 1.3em;
	margin: 0 0 0.25em 0;
}
h6 {
	color: #294B5F;
	font-size: 1em;
	line-height: 1.3em;
	margin: 0 0 0.25em 0;
}
/* END HEADINGS */
/* TEXT */
p {
/* default p font size, this is set different in some other divs */
	font-size: 1em;
/* some air around p elements */
	margin: 0 0 1.5em 0;
	line-height: 1.4em;
	padding: 0;
}
blockquote {
	border-left: 10px solid #ddd;
	margin-left: 10px;
}
strong, b {
/* explicit setting for these */
	font-weight: bold;
}
em, i {
/* explicit setting for these */
	font-style: italic;
}
/* Wrapping text in <code> tags. Makes CSS not validate */
code, pre {
/* css-3 */
	white-space: pre-wrap;
/* Mozilla, since 1999 */
	white-space: -moz-pre-wrap;
/* Opera 4-6 */
	white-space: -pre-wrap;
/* Opera 7 */
	white-space: -o-pre-wrap;
/* Internet Explorer 5.5+ */
	word-wrap: break-word;
	font-family: "Courier New", Courier, monospace;
	font-size: 1em;
}
pre {
/* black border for pre blocks */
	border: 1px solid #000;
/* set different from surroundings to stand out */
	background-color: #ddd;
	margin: 0 1em 1em 1em;
	padding: 0.5em;
	line-height: 1.5em;
	font-size: 90%;
}
/* Separating the divs on the template explanation page */
div.templatecode {
	margin: 0 0 2.5em;
}
/* END TEXT */
/* LISTS */
/* lists in content need some margins to look nice */
div#main ul,
div#main ol,
div#main dl {
	font-size: 1.0em;
	line-height: 1.4em;
	margin: 0 0 1.5em 0;
}
div#main ul li,
div#main ol li {
	margin: 0 0 0.25em 3em;
}
/* definition lists topics on bold */
div#main dl {
	margin-bottom: 2em;
	padding-bottom: 1em;
	border-bottom: 1px solid #c0c0c0;
}
div#main dl dt {
	font-weight: bold;
	margin: 0 0 0 1em;
}
div#main dl dd {
	margin: 0 0 1em 1em;
}
/* END LISTS */
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Layout Top menu + 2 columns');
$css->set_description('Navigation CSS rules used in CSSMenu top + 2 columns, ShadowMenu Tab + 2 columns and Top simple navigation + left subnavigation + 1 column Designs');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/******************** MENU *********************/
#menu_vert {
	margin: 0;
	padding: 0;
}
#menu_vert ul {
/* remove any bullets */
	list-style: none;
/* margin/padding set in li */
	margin: 0px;
	padding: 0px;
}
#menu_vert ul ul {
	margin: 0;
/* padding right sets second level li in on right from first li */
	padding: 0px 5px 0px 0px;
/* replaces bottom of li.menuactive menuparent, looks like li below it, set in 5px more, is sitting on top of it */
	background: transparent url([[root_url]]/uploads/ngrey/liup.gif) no-repeat right -4px;
}
#menu_vert li {
/* remove any bullets */
	list-style: none;
/* negative bottom margin pulls them together, images look like one border between */
	margin: 0px 0px -1px;
/* bottom padding pushes "a" up enough to show our image */
	padding: 0px 0px 4px 0px;
/* you can set your own image here */
	background: transparent url([[root_url]]/uploads/ngrey/liup.gif) no-repeat right bottom;
}
#menu_vert li.currentpage {
	padding: 0px 0px 3px 0px;
}
#menu_vert li.menuactive {
	margin: 0;
	padding: 0px;
/* replaced by image in ul ul */
	background: none;
}
#menu_vert li.menuactive ul {
	margin: 0;
}
#menu_vert li.activeparent {
	margin: 0;
	padding: 0px;
}
/* fix stupid IE6 bug with display:block; */
* html #menu_vert li {
	height: 1%;
}
* html #menu_vert li a {
	height: 1%;
}
* html #menu_vert li hr {
	height: 1%;
}
/** end fix **/
/* first level links */
div#menu_vert a {
/* IE6 has problems with this, fixed above */
	display: block;
/* some air for it */
	padding: 0.8em 0.3em 0.5em 1.5em;
/* this will be link color for all levels */
	color: #18507C;
/* Fixes IE7 whitespace bug */
	min-height: 1em;
/* no underline for links */
	text-decoration: none;
/* you can set your own image here this is tall enough to cover text heavy links */
	background: transparent url([[root_url]]/uploads/ngrey/libk.gif) no-repeat right top;
}
/* next level links, more padding and smaller font */
div#menu_vert ul ul a {
	font-size: 90%;
	padding: 0.8em 0.3em 0.5em 2.8em;
}
/* third level links, more padding */
div#menu_vert ul ul ul a {
	padding: 0.5em 0.3em 0.3em 3em;
}
/* hover state for all links */
div#menu_vert a:hover {
	background-color: transparent;
	color: #595959;
	text-decoration: underline;
}
div#menu_vert a.activeparent:hover {
	color: #595959;
}
/* active parent, that is the first level parent of a child page that is the current page */
div#menu_vert li.activeparent {
/* you can set your own image here */
	background: transparent url([[root_url]]/uploads/ngrey/liup.gif) no-repeat right -65px;
/* white to contrast with background image */
	color: #fff;
}
div#menu_vert li.activeparent a.activeparent {
/* you can set your own image here */
	background: transparent url([[root_url]]/uploads/ngrey/libk.gif) no-repeat right top;
/* to contrast with background image */
	color: #000;
}
div#menu_vert li a.parent {
/* takes left padding out so span image has room on left */
	padding-left: 0em;
}
div#menu_vert ul ul li a.parent {
/* increased padding on left offsets it from one above */
	padding-left: 0.9em;
}
div#menu_vert li a.parent span {
	display: block;
	margin: 0;
/* adds left padding taken out of "a.parent" */
	padding-left: 1.5em;
/* arrow on left for pages with children, points down, you can set your own image here */
	background: transparent url([[root_url]]/uploads/ngrey/active.png) no-repeat 2px center;
}
div#menu_vert li a.parent:hover {
/* removes underline hover effect */
	text-decoration: none;
}
div#menu_vert li a.parent:hover span {
	display: block;
	margin: 0;
	padding-left: 1.5em;
/* arrow on left for pages with children, points right for hover, you can set your own image here */
	background: transparent url([[root_url]]/uploads/ngrey/parent.png) no-repeat 2px center;
}
div#menu_vert li a.menuactive.menuparent {
/* sets it in a little more than a.parent */
	padding-left: 0.35em;
}
div#menu_vert ul ul li a.menuactive.menuparent {
/* sets it in a little more on next level */
	padding-left: 0.99em;
}
div#menu_vert li a.menuactive.menuparent span {
	display: block;
	margin: 0;
/* to contrast with non active pages */
	font-weight: bold;
	padding-left: 1.5em;
/* arrow on left for active pages with children, points right, you can set your own image here */
	background: transparent url([[root_url]]/uploads/ngrey/parent.png) no-repeat 2px center;
}
div#menu_vert li a.menuactive.menuparent:hover {
	text-decoration: none;
	color: #18507C;
}
div#menu_vert ul ul li a.activeparent {
	color: #fff;
}
/* current pages in the default Menu Manager template are unclickable. This is for current page on first level */
div#menu_vert ul h3 {
	display: block;
/* some air for it */
	padding: 0.8em 0.5em 0.5em 1.5em;
/* this will be link color for all levels */
	color: #000;
/* instead of the normal font size for <h3> */
	font-size: 1em;
/* as <h3> normally has some margin by default */
	margin: 0;
/* you can set your own image here, same as "a" */
	background: transparent url([[root_url]]/uploads/ngrey/libk.gif) no-repeat right top;
}
/* next level current pages, more padding, smaller font and no background color or bottom border */
div#menu_vert ul ul h3 {
	font-size: 90%;
	padding: 0.8em 0.5em 0.5em 2.8em;
/* you can set your own image here, same as "a" */
	background: transparent url([[root_url]]/uploads/ngrey/libk.gif) no-repeat right top;
	color: #000;
}
/* current page on third level, more padding */
div#menu_vert ul ul ul h3 {
	padding: 0.6em 0.5em 0.2em 3em;
}
/* BIG NOTE: I didn''t do anything to these, never tested */
/* section header */
div#menu_vert li.sectionheader {
	border-right: none;
	padding: 0.8em 0.5em 0.5em 1.5em;
	background: transparent url([[root_url]]/uploads/ngrey/libk.gif) no-repeat right top;
	line-height: 1em;
	margin: 0;
        color: #18507C;
        cursor:text;
}
/* separator */
div#menu_vert .separator {
	height: 1px !important;
	margin-top: -1px;
	margin-bottom: 0;
	-padding: 2px 0 2px 0;
	background-color: #000;
	overflow: hidden !important;
	line-height: 1px !important;
	font-size: 1px;
/* for ie */
}
div#menu_vert li.separator hr {
	display: none;
/* this is for accessibility */
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Navigation Simple - Vertical');
$css->set_description('Navigation CSS rules used in Left simple navigation + 1 column and Top simple navigation + left subnavigation + 1 column Designs');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/* by Alexander Endresen and mark */
#menu_vert {
/* no margin/padding so it fills the whole div */
	margin: 0;
	padding: 0;
}
.clearb {
/* needed for some browsers */
	clear: both;
}
#menuwrapper {
/* set the background color for the menu here */
	background-color: #243135;
/* IE6 Hack */
	height: 1%;
	width: auto;
/* one border at the top */
	border-top: 1px solid #3F565C;
	margin: 0;
	padding: 0;
}
ul#primary-nav {
	list-style-type: none;
	margin: 0px;
	padding-top: 10px;
	padding-left: 10px;
}
#primary-nav ul {
/* remove any default bullets */
	list-style-type: none;
/* sets width of second level ul to background image */
	width: 210px;
	margin: 0px;
	padding: 0px;
/* make the ul stay in place so when we hover it lets the drops go over the content instead of displacing it */
	position: absolute;
/* top being the bottom of the li it comes out of */
	top: auto;
/* keeps it hidden till hover event */
	display: none;
/* room at top for li so image top shows correct */
	padding-top: 9px;
/* set your image here, tall enough for the ul */
	background: url([[root_url]]/uploads/ngrey/ultopup.png) no-repeat left top;
}
/* IE6 hacks on the above code */
* html #primary-nav ul {
	padding-top: 13px;
	background: url([[root_url]]/uploads/ngrey/ultopup.gif) no-repeat left top;
}
#primary-nav ul ul {
/* insures no top margins */
	margin-top: 0px;
/* pulls the last ul back over the preceding ul */
	margin-left: -1px;
/* keeps the left side of this ul on the right side of the preceding ul */
	left: 100%;
/* negative margin pulls the left centered in li next to it */
	top: -3px;
/* set your image here, tall enough for the ul, this is the left arrow for third level ul */
	background: url([[root_url]]/uploads/ngrey/ultoprt.png) no-repeat left top;
}
/* IE6 hacks on the above code */
* html #primary-nav ul ul {
	margin-top: 0px;
	padding-left: 5px;
	left: 100%;
	top: -7px;
/* IE6 gets gif as it can''t handle transparent png */
	background: url([[root_url]]/uploads/ngrey/ultoprt.gif) no-repeat right top;
}
#primary-nav li {
/* a little space to the left of each top level menu item */
	margin-left: 5px;
/* floating left will set menu items to line up left to right else they will stack top to bottom */
	float: left;
}
#primary-nav li li {
/* a little more space to the left of each menu item */
	margin-left: 8px;
/* keeps them tight to the one above, no missed hovers */
	margin-top: -1px;
/* removes the left float set in first li so these will stack from top down */
	float: none;
/* relative to the ul they are in */
	position: relative;
}
/* IE6 hacks on the above code */
* html #primary-nav li li {
	margin-left: 6px;
/* helps hold it inside the ul */
	width: 171px;
}
ul#primary-nav li a {
/* specific font size, this could be larger or smaller than default font size */
	font-size: 1em;
/* make sure we keep the font normal */
	font-weight: normal;
/* set default link colors */
	color: #fff;
/* doing tab menus require a bit different padding, this will give room on right for image to show, adjust to width of your image */
	padding: 0px 11px 0px 0px;
/* makes it hold a shape */
	display: block;
/* remove default "a" underline */
	text-decoration: none;
}
ul#primary-nav li a span {
/* takes normal "a" padding minus some for right image */
	padding: 12px 4px 12px 15px;
/* makes it hold a shape */
	display: block;
}
ul#primary-nav li a:hover {
/* kind of obvious */
	background-color: transparent;
}
ul#primary-nav li {
/* set your image here */
	background:  url([[root_url]]/uploads/ngrey/navrttest.gif) no-repeat right -51px;
}
ul#primary-nav li span {
/* set your image here */
	background:  url([[root_url]]/uploads/ngrey/navlefttest.gif) repeat-x left -51px;
/* set text color here also to insure color */
	color: #fff;
/* just to be sure */
	font-weight: normal;
}
ul#primary-nav li li {
/* remove any image set in first level li */
	background:  none;
}
ul#primary-nav li li span {
/* remove any image set in first level li span */
	background:  none;
/* set text color here also to insure color */
	color: #fff;
/* just to be sure */
	font-weight: normal;
}
ul#primary-nav li:hover,
ul#primary-nav li.menuh,
ul#primary-nav li.menuparenth {
/* set hover image, right side */
	background:  url([[root_url]]/uploads/ngrey/navrttest.gif) no-repeat right 0px;
}
ul#primary-nav li:hover span,
ul#primary-nav li.menuh span,
ul#primary-nav li.menuparenth span {
/* set hover image, left side */
	background:  url([[root_url]]/uploads/ngrey/navlefttest.gif) repeat-x left 0px;
/* change text color on hover */
	color: #000;
	font-weight: normal;
}
/* IE6 hacks, the JS used for hover effect in IE6 puts class menuh on li, unless they have a class then just an "h" as seen above and below */
ul#primary-nav li li.menuh {
	background:  none;
	font-weight: normal;
}
/* IE6 hacks */
ul#primary-nav li.menuparenth li span {
	background:  none;
	color: #000;
	font-weight: normal;
}
/* IE6 hacks */
ul#primary-nav li.menuparenth li.menuparent span {
/* gif for IE6, as it can''t handle transparent png */
	background:  url([[root_url]]/uploads/ngrey/parent.gif) no-repeat right center;
	color: #000
}
/* IE6 hacks */
ul#primary-nav li.menuparenth li.menuh span {
	background:  none;
	color: #FFF;
	font-weight: normal;
}
/* IE6 hacks */
ul#primary-nav li.menuparenth li.menuparenth {
	background:  none;
	color: #FFF;
	font-weight: normal;
}
ul#primary-nav li.menuactive a {
/* set your image here for active tab right */
	background:  url([[root_url]]/uploads/ngrey/navrttest.gif) no-repeat right 0px;
}
ul#primary-nav li a.menuactive span {
/* set your image here for active tab left */
	background:  url([[root_url]]/uploads/ngrey/navlefttest.gif) repeat-x left 0px;
/* non active is #FFF/white, we need #000/black to contrast with light background */
	color: #000;
/* bold to set it off from non active */
	font-weight: bold;
}
#primary-nav li li a {
/* second level padding, no image and not as big */
	padding: 5px 10px;
/* to keep it within li */
	width: 165px;
/* space between them */
	margin: 5px;
	background: none;
}
/* IE6 hacks to above code */
* html #primary-nav li li a {
	padding: 5px 10px;
	width: 165px;
	margin: 0px;
	color: #000;
}
#primary-nav li li:hover {
/* remove image set in first level */
	background: none;
}
#primary-nav li li a:hover {
/* set different image than first level */
	background:  url([[root_url]]/uploads/ngrey/darknav.png) repeat-x left center;
/* we need #FFF/white to contrast with dark background */
	color: #FFF;
}
#primary-nav li.menuparent li a:hover span {
/* insures text color */
	color: #FFF;
}
ul#primary-nav li:hover li a span {
/* first level is #FFF/white, we need #000/black to contrast with light background */
	color: #000;
/* just to insure normal */
	font-weight: normal;
}
#primary-nav li li.menuactive a.menuactive, #primary-nav li li.menuactive a.menuactive:hover {
/* set your image here, lighter than hover */
	background:  url([[root_url]]/uploads/ngrey/nav.png) repeat-x left 0px;
/* non active is #FFF/white, we need #000/black to contrast with light background */
	color: #000;
}
#primary-nav li li.menuactive a.menuactive span {
/* insures text color */
	color: #000
}
#primary-nav li li.menuactive a.menuactive:hover span {
/* insures text color */
	color: #000;
}
/* IE6 hacks to above code */
#primary-nav li li.menuparenth a.menuparent span {
/* right arrow for menu parent, IE6 gif */
	background:  url([[root_url]]/uploads/ngrey/parent.gif) no-repeat right center;
	color: #000
}
/* IE6 hacks to above code */
#primary-nav li li.menuparenth a.menuparent:hover span {
	color: #FFF
}
#primary-nav li li.menuparent a.menuparent span {
/* right arrow for parent item */
	background:  url([[root_url]]/uploads/ngrey/parent.gif) no-repeat right center;
}
#primary-nav li.menuactive li a:hover span {
/* black text */
	color: #000
}
ul#primary-nav li li a.menuactive  span {
/* remove image set in first level */
	background:  none;
	font-weight: normal;
}
#primary-nav li.menuactive li a {
/* second level active link color */
	color: #0587A9;
	text-decoration: none;
	background: none;
}
#primary-nav li.menuactive li a:hover {
/* dark image for hover */
	background:  url([[root_url]]/uploads/ngrey/darknav.png) repeat-x left center;
}
#primary-nav li.menuactive li a:hover span {
/* white text to contrast with dark background image on hover */
	color: #FFF;
}
ul#primary-nav li:hover li a span, ul#primary-nav li.menuparenth li a span {
	padding: 0px;
	background:  none;
}
/* this is a special li type from the menu template, used to hold the bottom image for ul set above */
#primary-nav ul li.separator, #primary-nav .separator:hover {
/* set same as ul */
	width: 210px;
/* height of image */
	height: 9px;
/* negative margin pulls it down to cover ul image */
	margin: 0px 0px -8px;
/* set your image here */
	background: url([[root_url]]/uploads/ngrey/ulbtmrt.png) no-repeat left bottom;
}
/* same as above for next level to insure it shows correct */
#primary-nav ul ul li.separator, #primary-nav ul ul li.separator:hover {
	height: 9px;
	margin: 0px 0px -8px;
	background: url([[root_url]]/uploads/ngrey/ulbtmrt.png) no-repeat left bottom;
}
/* IE6 hacks */
* html #primary-nav ul li.separator {
	height: 2px;
	background: url([[root_url]]/uploads/ngrey/ulbtmrt.gif) no-repeat left bottom;
}
/* IE6 hacks */
* html #primary-nav ul li.separatorh {
	margin: 0px 0px -8px;
	height: 2px;
	background: url([[root_url]]/uploads/ngrey/ultop.gif) no-repeat left top;
}
/* The magic - set to work for up to a 3 level menu, but can be increased unlimited, for fourth level add
#primary-nav li:hover ul ul ul,
#primary-nav li.menuparenth ul ul ul,
*/
#primary-nav ul,
#primary-nav li:hover ul,
#primary-nav li:hover ul ul,
#primary-nav li.menuparenth ul,
#primary-nav li.menuparenth ul ul {
	display: none;
}
/* for fourth level add
#primary-nav ul ul ul li:hover ul,
#primary-nav ul ul ul li.menuparenth ul,
*/
#primary-nav li:hover ul,
#primary-nav ul li:hover ul,
#primary-nav ul ul li:hover ul,
#primary-nav li.menuparenth ul,
#primary-nav ul li.menuparenth ul,
#primary-nav ul ul li.menuparenth ul {
	display: block;
}
/* IE Hacks */
#primary-nav li li {
	float: left;
	clear: both;
}
#primary-nav li li a {
	height: 1%;
}
EOT;
$css = new CmslayoutStylesheet;
$css->set_name('Navigation ShadowMenu - Horizontal');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/* Vertical menu for the CMS CSS Menu Module */
/* by Alexander Endresen and mark */
#menuwrapper {
/* just smaller than it's containing div */
	width: 95%;
	margin-left: 0px;
/* room at bottom */
	margin-bottom: 10px;
}
/* Unless you know what you do, do not touch this */
#primary-nav, #primary-nav ul {
/* remove any default bullets */
	list-style: none;
	margin: 0px;
	padding: 0px;
/* make sure it fills out */
	width: 100%;
/* just a little bump */
	margin-left: 1px;
}
#primary-nav li {
/* negative bottom margin pulls them together, images look like one border between */
	margin-bottom: -1px;
/* keeps within it's container */
	position: relative;
/* bottom padding pushes "a" up enough to show our image */
	padding: 0px 0px 4px 0px;
/* you can set your own image here */
	background: url([[root_url]]/uploads/ngrey/liup.gif) no-repeat right bottom;
}
#primary-nav li li {
/* you can set your width here, if no width or set auto it will only be as wide as the text in it  */
	width: 190px;
/* changes padding inherited from first level */
	padding: 0px 10px;
/* removes first level li image */
	background-image: none;
}
/* Styling the basic appearance of the menu "a" elements */
ul#primary-nav li a {
/* specific font size, this could be larger or smaller than default font size */
	font-size: 1em;
/* make sure we keep the font normal */
	font-weight: normal;
/* set default link colors */
	color: #595959;
/* pushes li out from the text, sort of like making links a certain size, if you give them a set width and/or height you may limit you ability to have as much text as you need */
	padding: 0.8em 0.5em 0.5em 0.5em;
/* makes it hold a shape */
	display: block;
/* removes underline from default link setting */
	text-decoration: none;
/* you can set your own image here this is tall enough to cover text heavy links */
	background: url([[root_url]]/uploads/ngrey/libk.gif) no-repeat right top;
}
ul#primary-nav a span {
/* makes it hold a shape */
	display: block;
/* pushes text to right */
	padding-left: 1.5em;
}
ul#primary-nav li a:hover {
/* stops image flicker in some browsers */
	background: url([[root_url]]/uploads/ngrey/libk.gif) no-repeat right top;
/* changes text color on hover */
	color: #899092
}
ul#primary-nav li li a:hover {
/* you can set your own image here, second level "a" */
	background:  url([[root_url]]/uploads/ngrey/darknav.png) repeat-x left center;
/* contrast color to image behind it */
	color: #FFF
}
ul#primary-nav li a.menuactive {
/* black and bold to set it off from non active */
	color: #000;
	font-weight: bold;
}
ul#primary-nav li ul a {
/* insure alignment */
	text-align: left;
	margin: 0px;
/* relative to it's container */
	position: relative;
/* even padding all 4 sides */
	padding: 6px;
/* make sure we keep the font normal */
	font-weight: normal;
/* set default link colors from here on */
	color: #000;
/* remove any background that may have been set in level above */
	background: none;
}
ul#primary-nav li ul {
/* remove any default bullets */
	list-style-type: none;
/* sets width of second level ul to background image */
	width: 209px;
	height: auto;
/* negative margin pulls it over the parent ul */
	margin: 0px 0px 0px -2px;
/* top padding gives room for image shadow and pushes li down into image */
	padding: 10px 0px 0px;
/* make the ul stay in place so when we hover it lets the drops go over the content instead of displacing it */
	position: absolute;
/* keeps the left side of this ul on the right side of the preceding ul */
	left: 100%;
/* negative top pulls up so left arrow centered in li next to it */
	top: -2px;
	display: none;
/* set your image here, tall enough for the ul, this is the left arrow for second ul and on */
	background: url([[root_url]]/uploads/ngrey/ultoprt.png) no-repeat left top;
}
/* a lot of the same as above, minor changes */
ul#primary-nav li ul ul {
	list-style-type: none;
/* bit more negative left margin */
	margin: 0px 0px 0px -8px;
/* you can call a property twice but not a property:'value', this flat lines it */
	padding: 0px;
/* now we just change one with 'property'-top:value */
	padding-top: 10px;
	position: absolute;
	width: 209px;
	height: auto;
/* negative top pulls up so left arrow centered in li next to it, more on 3rd ul covers default drop increase */
	top: -5px;
	left: 100%;
	display: none;
/* set your image here */
	background: url([[root_url]]/uploads/ngrey/ultoprt.png) no-repeat left top;
}
* html ul#primary-nav li ul {
/* gif for IE6, as it can't handle transparent png */
	background: url([[root_url]]/uploads/ngrey/ultoprt.gif) no-repeat left top;
}
* html ul#primary-nav li ul ul {
/* gif for IE6, as it can't handle transparent png */
	background: url([[root_url]]/uploads/ngrey/ultoprt.gif) no-repeat left top;
}
/* this is a special li type from the menu template, used to hold the bottom image for ul set above */
#primary-nav ul li.separator, #primary-nav .separator:hover {
/* set same as ul */
	width: 209px;
	padding: 0px;
/* height of image */
	height: 9px;
/* negative margin pulls it down to cover ul image */
	margin: 0px 0px -9px;
/* set your image here */
	background: url([[root_url]]/uploads/ngrey/ulbtmrt.png) no-repeat left bottom;
}
/* IE6 'star html' Hack */
* html #primary-nav  li ul li.separator {
	height: 2px;
/* set your image here */
	background: url([[root_url]]/uploads/ngrey/ulbtmrt.gif) no-repeat left bottom;
}
/* Fixes IE7 bug*/
#primary-nav li, #primary-nav li.menuparent {
	min-height: 1em;
}
/* Styling the basic apperance of the active page elements (shows what page in the menu is being displayed) */
#primary-nav li li.menuactive a.menuactive {
/* contrast color to image behind it */
	color: #FFF;
/* not bold as text color and image behind it set it off from non active */
	font-weight: normal;
/* set your image here, dark grey image with white text set above*/
	background:  url([[root_url]]/uploads/ngrey/darknav.png) repeat-x left center;
}
#primary-nav li.menuparent span {
/* padding on left for image */
	padding-left: 1.5em;
/* down arrow to note it has children, left side of text */
	background: url([[root_url]]/uploads/ngrey/active.png) no-repeat left center;
}
#primary-nav li.menuparent:hover li.menuparent span {
/* remove left padding as image is on right side of text */
	padding-left: 0;
/* right arrow to note it has children, right side of text */
	background: url([[root_url]]/uploads/ngrey/parent.png) no-repeat right center;
}
#primary-nav li.menuparenth li.menuparent span,
#primary-nav li.menuparenth li.menuparenth span {
/* same as above but this is for IE6, gif image as it can't handle transparent png */
	padding-left: 0;
	background: url([[root_url]]/uploads/ngrey/parent.gif) no-repeat right center;
}
#primary-nav li.menuparent:hover span,
#primary-nav li.menuparent.menuactive span,
#primary-nav li.menuparent.menuactiveh span,
#primary-nav li.menuparenth span {
/* right arrow on hover */
	background: url([[root_url]]/uploads/ngrey/parent.png) no-repeat left center;
}
#primary-nav li li span,
#primary-nav li.menuparent li span,
#primary-nav li.menuparent:hover li span,
#primary-nav li.menuparenth li span,
#primary-nav li.menuparenth li.menuparenth li span,
#primary-nav li.menuparent li.menuparent li span,
#primary-nav li.menuparent li.menuparent:hover li span {
/* removes any images set above unless it's a parent or active parent */
	background:  none;
	padding-left: 0px;
}
/* Styling the appearance of menu items on hover */
#primary-nav li:hover li a,
#primary-nav li.menuh li a,
#primary-nav li.menuparenth li a,
#primary-nav li.menuactiveh li a {
/* removes any images set above unless it's a parent or active parent */
	background:  none;
	color: #000;
}
/* The magic - set to work for up to a 3 level menu, but can be increased unlimited, for fourth level add
#primary-nav li:hover ul ul ul,
#primary-nav li.menuparenth ul ul ul,
*/
#primary-nav ul,
#primary-nav li:hover ul,
#primary-nav li:hover ul ul,
#primary-nav li.menuparenth ul,
#primary-nav li.menuparenth ul ul {
	display: none;
}
/* for fourth level add
#primary-nav ul ul ul li:hover ul,
#primary-nav ul ul ul li.menuparenth ul,
*/
#primary-nav li:hover ul,
#primary-nav ul li:hover ul,
#primary-nav ul ul li:hover ul,
#primary-nav li.menuparenth ul,
#primary-nav ul li.menuparenth ul,
#primary-nav ul ul li.menuparenth ul {
	display: block;
}
/* IE Hack, will cause the css to not validate */
#primary-nav li, #primary-nav li.menuparenth {
	_float: left;
	_height: 1%;
}
#primary-nav li a {
	_height: 1%;
}
/* BIG NOTE: I didn't do anything to these 2, never tested */
#primary-nav li.sectionheader {
	border-left: 1px solid #006699;
	border-top: 1px solid #006699;
	font-size: 130%;
	font-weight: bold;
	padding: 1.5em 0 0.8em 0.5em;
	background-color: #fff;
	margin: 0;
	width: 100%;
}
/* separator */
#primary-nav li hr.separator {
	display: block;
	height: 0.5em;
	color: #abb0b6;
	background-color: #abb0b6;
	width: 100%;
	border: 0;
	margin: 0;
	padding: 0;
	border-top: 1px solid #006699;
	border-right: 1px solid #006699;
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Navigation ShadowMenu - Vertical');
$css->set_description('Navigation CSS rules used in ShadowMenu left + 1 column Design');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
#footer ul {
/* some margin is set in the footer padding */
   margin: 0px;
/* calling a specific side, left in this case */
   margin-left: 5px;
   padding: 0px;
/* remove any default bullets, image used in li call */
   list-style: none;
}
#footer ul li {
/* remove any default bullets, image used for consistency */
   list-style: none;
/* float left to set first level li items across the top */
   float:left;
/* a little margin at top */
   margin: 5px 0px 0px;
/* padding all the way around */
   padding: 5px;
/* you can set your own image here, used for consistency */
   background: url([[root_url]]/uploads/ngrey/dot.gif) no-repeat left 10px;
}
#footer ul li a {
/* this will make the "a" link a solid shape */
   display:block;
   margin: 2px 0px 4px;
   padding: 0px 5px 5px 5px;
}
/* set h3 to look like "a" */
#footer li h3 {
   font-weight:normal;
   font-size:100%;
   margin: 2px 0px 2px 0px;
   padding: 0px 5px 5px 5px;
}
/* set h3 to look like "a", less margin at this level */
#footer li li h3 {
   font-weight:normal;
   font-size:100%;
   margin: 0px;
   padding: 0px 5px 5px 5px;
}
#footer ul li li {
/* remove any default bullets, image used for consistency */
   list-style: none;
/* remove float so they line up under top li */
   float:none;
/* less margin/padding */
   margin: 0px;
   padding: 0px 0px 0px 5px;
/* you can set your own image here, used for consistency */
   background: url([[root_url]]/uploads/ngrey/dot.gif) no-repeat left 3px;
}
/* fix for IE6 */
* html #footer ul li a {
   margin: 2px 0px 0px;
   padding: 0px 5px 5px 5px;
}
* html #footer ul li li a {
   margin: 0px 0px 0px;
   padding: 0px 5px 0px 5px;
}
/* End fix for IE6 */
#footer ul ul {
/* remove float so they line up under top li */
   float:none;
/* a little margin to offset it */
   margin: 0px 0px 0px 8px;
   padding: 0;
}
#footer ul ul ul {
/* remove float so they line up under li above it */
   float:none;
/* a little margin to offset it */
   margin: 0px 0px 0px 8px;
   padding: 0;
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Navigation FatFootMenu');
$css->set_description('Footer navigation CSS rules used in CSSMenu left + 1 column, CSSMenu top + 2 columns, Left simple navigation + 1 column, ShadowMenu left + 1 column, ShadowMenu Tab + 2 columns and Top simple navigation + left subnavigation + 1 column');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/*
  @Nuno Costa [criacaoweb.net] Core CSS.
  @Licensed under GPL and MIT.
  @Status: Stable
  @Version: 0.1-20090418

  @Contributors:

  ---------------------------------------------------------------
*/
/*----------- Global Containers ----------- */
/*
.core-wrap-100   =  width - 100% of Browser Fluid
.core-wrap-960   =  width - 960px  - fixed
.core-wrap-780   =  width - 780px  - fixed
.custom-wrap-x   =  width -  custom   - declared in another css (your site css)
*/
.core-wrap-100 {
	width: 100%;
}
.core-wrap-960 {
	width: 960px;
}
.core-wrap-780 {
	width: 780px;
}
.core-wrap-100,
.core-wrap-960,
.core-wrap-780,
.custom-wrap-x {
	margin-left: auto;
	margin-right: auto;
}
/*----------- Global Float ----------- */
.core-wrap-100  .core-float-left,
.core-wrap-960  .core-float-left,
.core-wrap-780  .core-float-left,
.custom-wrap-x  .core-float-left {
	float: left;
	display: inline;
}
.core-wrap-100  .core-float-right,
.core-wrap-960  .core-float-right,
.core-wrap-780  .core-float-right,
.custom-wrap-x  .core-float-right {
	float: right;
	display: inline;
}
/*----------- Global Center ----------- */
.core-wrap-100   .core-center,
.core-wrap-960   .core-center,
.core-wrap-780   .core-center,
.custom-wrap-x   .core-center {
	margin-left: auto;
	margin-right: auto;
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('ncleanbluecore');
$css->set_description('Grid CSS rules used in NCleanBlue Design');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/*
  @Nuno Costa [criacaoweb.net] Utils CSS.
  @Licensed under GPL2 and MIT.
  @Status: Stable
  @Version: 0.1-20090418

  @Contributors:
        -  http://meyerweb.com/eric/tools/css/reset/index.html

  ---------------------------------------------------------------
*/
/* From: http://meyerweb.com/eric/tools/css/reset/index.html  (Original) */
/* v1.0 | 20080212 */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-size: 100%;
	vertical-align: baseline;
	background: transparent;
}
/*
Stantby for nowbody {
	line-height: 1;
}
*/
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before,
blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
/* remember to define focus styles! */
:focus {
	outline: 0;
}
/* remember to highlight inserts somehow! */
ins {
	text-decoration: none;
}
del {
	text-decoration: line-through;
}
/* tables still need 'cellspacing="0"' in the markup */
table {
	border-collapse: collapse;
	border-spacing: 0;
}
/* ------- @Nuno Costa [criacaoweb.net] Utils CSS. ---------- */
* {
	font-weight: inherit;
	font-style: inherit;
	font-family: inherit;
}
dfn {
	display: none;
	overflow: hidden;
}
/* ----------- Clear Floated Elements ----------- */
html body .util-clearb {
	background: none;
	border: 0;
	clear: both;
	display: block;
	float: none;
	font-size: 0;
	margin: 0;
	padding: 0;
	position: static;
	overflow: hidden;
	visibility: hidden;
	width: 0;
	height: 0;
}
/* ----------- Fix to Clear Floated Elements ----------- */
.util-clearfix:after {
	clear: both;
	content: '.';
	display: block;
	visibility: hidden;
	height: 0;
}
.util-clearfix {
	display: inline-block;
}
* html .util-clearfix {
	height: 1%;
}
.util-clearfix {
	display: block;
}
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('ncleanblueutils');
$css->set_description('Reset and browser helper CSS style rules used in NCleanBlue Design');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
/*
@Nuno Costa [criacaoweb.net]
@Since [cmsms 1.6]
@Contributors: Mark and Dev-Team
*/
body {
/* default text for entire site */
	font: normal 0.8em Tahoma, Verdana, Arial, Helvetica, sans-serif;
/* default text color for entire site */
	color: #3A3A36;
/* you can set your own image and background color here */
	background: #fff url([[root_url]]/uploads/NCleanBlue/bg__full.png) repeat-x scroll left top;
}
/* Mask helper  for browsers ZOOM, Rezise and Decrease */
#ncleanblue {
/* set to width of viewport */
	width: auto;
/* you can set your own image and background color here */
	background: #fff url([[root_url]]/uploads/NCleanBlue/bg__full.png) repeat-x scroll left top;
}
/* wiki style external links */
/* external links will have "(external link)" text added, lets hide it */
a.external span {
	position: absolute;
	left: -5000px;
	width: 4000px;
}
a.external {
/* make some room for the image, css shorthand rules, read: first top padding 0 then right padding 12px then bottom then right */
	padding: 0 12px 0 0;
}
/* colors for external links */
a.external:link {
	color: #679EBC;
/* background image for the link to show wiki style arrow */
	background: url([[root_url]]/uploads/NCleanBlue/external.gif) no-repeat 100% -100px;
}
a.external:visited {
	color: #18507C;
/* a different color can be used for visited external links */
/* Set the last 0 to -100px to use that part of the external.gif image for different color for active links external.gif is actually 300px tall, we can use different positions of the image to simulate rollover image changes.*/
	background: url([[root_url]]/uploads/NCleanBlue/external.gif) no-repeat 100% -100px;
}
a.external:hover {
	color: #18507C;
/* Set the last 0 to -200px to use that part of the external.gif image for different color on hover */
	background: url([[root_url]]/uploads/NCleanBlue/external.gif) no-repeat 100% 0;
	background-color: inherit;
}
/* end wiki style external links */
/* hr and anything with the class of accessibility is hidden with CSS from visual browsers */
.accessibility, hr {
/* absolute lets us put it outside the viewport with the indents, the rest is to clear all defaults */
	position: absolute;
	top: -9999em;
	left: -9999em;
	background: none;
	border: 0;
	clear: both;
	display: block;
	float: none;
	font-size: 0;
	margin: 0;
	padding: 0;
	overflow: hidden;
	visibility: hidden;
	width: 0;
	height: 0;
	border: none;
}
/* ------------ Standard  HTML elements and their default settings ------------ */
b, strong{font-weight: bold;}i, em{	font-style: italic;}
p {
	padding: 0;
	margin-top: 0.5em;
    margin-bottom: 1em;
   text-align:left;
}
h1, h2, h3, h4, h5 {
	line-height: 1.6em;
	font-weight: normal;
	width: auto;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
/*default link styles*/
a {
	color: #679EBC;
	text-decoration: none;
	text-align: left;
}
a:hover {
	color: #3A6B85;
}
a:active {
	color: #3A6B85;
}
a:visited {
	color: #679EBC;
}
input, textarea, select {
	font-size: 0.95em;
}
/* ------------ Wrapper ------------ */
div#pagewrapper {
	font-size: 95%;
	position: relative;
	z-index: 1;
}
/* ------------ Header ------------ */
#header {
	height: 111px;
	width: 960px;
}
#logo a {
/* adjust according your image size */
	height: 75px;
	width: 215px;
/* forces full link size */
	display: block;
/* this hides the text */
	text-indent: -9999em;
	margin-top: 0;
	margin-left: 0;
/* you can set your own image here, note size adjustments */
	background: url([[root_url]]/uploads/NCleanBlue/logo.png) no-repeat left top;
}
/* ------------ Header - Search ------------ */
div#search {
	width: 190px;
	height: 28px;
	margin-top: 31px;
	margin-right: 20px;
}
div#search label {
	text-indent: -9999em;
	height: 0pt;
	width: 0pt;
	display: none;
}
div#search input.search-input {
/* specific size for image, your image may need these adjusted */
	width: 143px;
	height: 17px;
/* removes default borders, allows use of image */
	border-style: none;
/* text color */
	color: #999;
/* padding of text */
	padding: 7px 0px 4px 10px;
	float: left;
/* set all font properties at once, weight, size, family */
	font: bold 0.9em Arial, Helvetica, sans-serif;
/* left input image, set your own here */
	background: url([[root_url]]/uploads/NCleanBlue/search.png) no-repeat left top;
}
div#search input.search-button {
/* specific size for image, your image may need these adjusted */
	width: 37px;
	height: 28px;
/* removes default borders, allows use of image */
	border-style: none;
/* hides text, image has text */
	text-indent: -9999em;
	float: left;
	margin: 0;
/* provides positive hover effect */
	cursor: pointer;
/* removes default size/height */
	font-size: 0px;
	line-height: 0px;
/* submit button image, set your own here */
	background: transparent url([[root_url]]/uploads/NCleanBlue/search.png) no-repeat right top;
}
/* ------------ Content ------------ */
#content {
	width: auto;
/* all text in #content will default align left, changed in other calls */
	text-align: left;
}
#bar {
	width: auto;
	height: 40px;
	padding-right: 1em;
	padding-left: 1em;
}
.print {
	margin-right: 75px;
	margin-top: 10px;
}
#version {
	width: 50px;
	height: 31px;
	position: absolute;
	z-index: 5;
	top: 130px;
	right: -16px;
	font-size: 1.6em;
	font-weight: bold;
	padding: 28px 15px;
	color: #FFF;
	text-align: center;
	vertical-align: middle;
	background:  url([[root_url]]/uploads/NCleanBlue/version.png) no-repeat left top;
}
/* IE6 fixes */
* html div#version {
	top: 150px;
}
/* End IE6 fixes */
/* Site Title */
h1.title {
	font-size: 1.8em;
	color: #666666;
	margin-bottom: 0.5em;
}
/* Breadcrumbs */
div.breadcrumbs {
	padding: 0.5em 0;
	font-size: 80%;
	margin: 0 1em;
}
div.breadcrumbs span.lastitem {
	font-weight: bold;
}
/* ------------ Side Bar (Left) ------------ */
#left {
	width: 250px;
}
/* Image that Represents the new CMS design */
#left .screen {
	margin: 10px 50px;
}
/* End  */
.sbar-title {
	font: bold 1.2em Arial, Helvetica, sans-serif;
	color: #252523;
}
.sbar-top {
	height: 20px;
	width: auto;
	padding: 10px;
	background: url([[root_url]]/uploads/NCleanBlue/bg__content.png) no-repeat left top;
}
.sbar-main {
	width: auto;
	border-right: 1px solid #E2E2E2;
	border-left: 1px solid #E2E2E2;
	background: #F0F0F0;
}
span.sbar-bottom {
	width: auto;
	display: block;
	height: 10px;
	background: url([[root_url]]/uploads/NCleanBlue/bg__content.png) no-repeat left bottom;
}
/* ------------ Main (Right) ------------ */
#main {
	width: 690px;
}
.main-top {
	height: 15px;
	width: auto;
	background: url([[root_url]]/uploads/NCleanBlue/bg__content.png) no-repeat right top;
}
.main-main {
	width: auto;
	border-right: 1px solid #E2E2E2;
	border-left: 1px solid #E2E2E2;
	background: #F0F0F0;
	padding: 20px;
	padding-top: 0px;
}
.main-bottom {
	width: auto;
	height: 41px;
	background: url([[root_url]]/uploads/NCleanBlue/bg__content.png) no-repeat right bottom;
}
.right49, .left49 {
	font-size: 0.85em;
	margin: 7px 5px 5px 10px;
	font-weight: bold;
}
.left49 span {
	display: block;
	padding-top: 1px;
}
.left49 a {
	font-weight: normal;
}
.right49 {
	height: 28px;
	width: 50px;
	padding-right: 10px;
	background: url([[root_url]]/uploads/NCleanBlue/bull.png) no-repeat right top;
}
.right49 a, .right49 a:visited {
	padding: 7px 4px;
	display: block;
	color: #000;
	height: 15px;
	background: url([[root_url]]/uploads/NCleanBlue/bull.png) no-repeat  left top;
}
#main h2,
#main h3,
#main h4,
#main h5,
#main h6 {
	font-size: 1.4em;
	color: #301E12;
}
div#main ul,
div#main ol,
div#main dl,
#footer ul,
#footer ol {
	line-height: 1em;
	margin: 0 0 1.5em 0;
}
div#main ul,
#footer ul {
	list-style: circle;
}
div#main ul li,
div#main ol li,
#footer ul li,
#footer ol li {
	padding: 2px 2px 2px 5px;
	margin-left: 20px;
}
/* definition lists topics on bold */
div#main dl dt {
	font-weight: bold;
	margin: 0 0 0 1em;
}
div#main dl dd {
	margin: 0 0 1em 1em;
}
div#main dl {
	margin-bottom: 2em;
	padding-bottom: 1em;
	border-bottom: 1px solid #c0c0c0;
}
/* ------------ Footer ------------ */
#footer-wrapper {
	min-height: 235px;
	height: auto!important;
	height: 235px;
	width: auto;
	margin-top: 5px;
	text-align: center;
	margin-right: 00px;
	margin-left: 0px;
	background: #7CA3B5 url([[root_url]]/uploads/NCleanBlue/bg__footer.png) repeat-x left top;
}
#footer {
	color: #FFF;
	font-size: 0.8em;
	min-height: 235px;
	height: auto!important;
	height: 235px;
	background: #7CA3B5 url([[root_url]]/uploads/NCleanBlue/bg__footer.png) repeat-x left top;
}
#footer .block {
	width: 300px;
	margin: 20px 10px 10px;
}
#footer .cms {
	text-align: right;
}
/* ------------ Footer Links ------------ */
#footer ul {
	width: auto;
	text-align: left;
	margin-left: 50px;
}
#footer ul ul {
	margin-left: 0px;
}
#footer ul li a {
	color: #FFF;
	display: block;
	font-weight: normal;
	margin-bottom: 0.5em;
	text-decoration: none;
}
#footer a {
	color: #DCEDF1;
	text-decoration: underline;
	font-weight: bold;
}
/* ------------ END LAYOUT ---------------*/
/* ------------  Menu  ROOT  ------------ */
.page-menu {
	width: auto;
	height: 35px;
	margin: 3px 0 0 20px;
}
.menuwrapper {}

ul#primary-nav li hr.menu_separator{
        position: relative;
        visibility: hidden;
        display:block;
        width:5px;
       	height: 32px;
       	margin: 0px 5px 0px;
}
.page-menu ul#primary-nav {
	height: 1%;
	float: left;
	list-style: none;
	padding: 0;
	margin: 0;
}
.page-menu ul#primary-nav li {
	float: left;
}
.page-menu ul#primary-nav li a,
.page-menu ul#primary-nav li a span {
	display: block;
	padding: 0 10px;
	background-repeat: no-repeat;
	background-image: url([[root_url]]/uploads/NCleanBlue/tabs.gif);
}
.page-menu ul#primary-nav li a {
	padding-left: 0;
	color: #000;
	font-weight: bold;
	line-height: 2.15em;
	text-decoration: none;
	margin-left: 1px;
	font-size: 0.85em;
}
.page-menu ul#primary-nav li a:hover,
.page-menu ul#primary-nav li a:active {
	color: #000;
}
.page-menu ul#primary-nav li a.menuactive,
.page-menu ul#primary-nav li a:hover span {
	color: #000;
}
.page-menu ul#primary-nav li a span {
	padding-top: 6px;
	padding-right: 0;
	padding-bottom: 5px;
}
.page-menu ul#primary-nav li a.menuparenth,
.page-menu ul#primary-nav li a.menuactive,
.page-menu ul#primary-nav li a:hover,
.page-menu ul#primary-nav li a:focus,
.page-menu ul#primary-nav li a:active {
	background-position: 100% -120px;
}
.page-menu ul#primary-nav li a {
	background-position: 100% -80px;
}
.page-menu ul#primary-nav li a.menuactive span,
.page-menu ul#primary-nav li a:hover span,
.page-menu ul#primary-nav li a:focus span,
.page-menu ul#primary-nav li a:active span {
	background-position: 0 -40px;
}
.page-menu ul#primary-nav li a span {
	background-position: 0 0;
}
.page-menu ul#primary-nav .sectionheader,
.page-menu ul#primary-nav li a:link.menuactive,
.page-menu ul#primary-nav li a:visited.menuactive {
/* @ Opera, use pseudo classes otherwise it confuses cursor... */
	cursor: text;
}
.page-menu ul#primary-nav li span,
.page-menu ul#primary-nav li a,
.page-menu ul#primary-nav li a:hover,
.page-menu ul#primary-nav li a:focus,
.page-menu ul#primary-nav li a:active {
/* @ Opera, we need to be explicit again here now... */
	cursor: pointer;
}
/* Additional IE specific bug fixes... */
* html .page-menu ul#primary-nav {
	display: inline-block;
}
*:first-child+html .page-menu ul#primary-nav {
	display: inline-block;
}
/* --------------------  menu dropdow  -------------------------
/* Unless you know what you do, do not touch this */
/* Reset all ROOT menu styles. */
ul#primary-nav ul.unli li li a span,
ul#primary-nav ul.unli li a span,
ul#primary-nav .menuparent .unli .menuparent .unli li a span {
	font-weight: normal;
	background-image: none;
	display: block;
	padding-top: 0px;
	padding-left: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
}
#primary-nav {
	margin: 0px;
	padding: 0px;
}
#primary-nav ul {
	list-style: none;
	margin: -6px 0px 0px;
	padding: 0px;
/* Set the width of the menu elements at second level. Leaving first level flexible. */
	width: 209px;
}
#primary-nav ul {
	position: absolute;
	z-index: 1001;
	top: auto;
	display: none;
	padding-top: 9px;
	background: url([[root_url]]/uploads/NCleanBlue/ultop.png) no-repeat left top;
}
* html #primary-nav ul.unli {
	padding-top: 12px;
	background: url([[root_url]]/uploads/NCleanBlue/ultop.gif) no-repeat left top;
}
#primary-nav ul.unli ul {
	margin-left: -7px;
	left: 100%;
	top: 3px;
}
* html #primary-nav ul.unli ul {
	margin-left: -0px;
}
#primary-nav li {
	margin: 0px;
	float: left;
}
#primary-nav li li {
	margin-left: 7px;
	margin-top: -1px;
	float: none;
	position: relative;
}
/* Styling the basic appearance of the menu elements */
ul#primary-nav ul hr.menu_separator{
        position: relative;
        visibility: visible;
        display:block;
        width:130px;
       	height: 1px;
       	margin: 2px 30px 2px;
	padding: 0em;
	border-bottom: 1px solid #ccc;
	border-top-width: 0px;
	border-right-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;
}
#primary-nav .separator,
#primary-nav .separatorh {
	height: 9px;
	width: 209px;
	margin: 0px 0px -8px;
	background: url([[root_url]]/uploads/NCleanBlue/ulbtm.png) no-repeat left bottom;
}
* html #primary-nav .separator {
       z-index:-1;
	background: url([[root_url]]/uploads/NCleanBlue/ulbtm.gif) no-repeat left bottom;
}
*:first-child+html #primary-nav .separator {
       z-index:-1;
}
#primary-nav ul.unli li a {
	padding: 0px 10px;
	width: 165px;
	margin: 5px;
	background-image: none;
}
* html #primary-nav ul.unli li a {
	padding: 0px 10px 0px 5px;
	width: 165px;
	margin: 5px 0px;
}
#primary-nav li li a:hover {
	background-color: #DBE7F2;
}
/* Styling the basic appearance of the active page elements (shows what page in the menu is being displayed) */
#primary-nav li.menuactive li a {
	text-decoration: none;
	background: none;
}
#primary-nav ul.unli li.menuparenth,
#primary-nav ul.unli a:hover,
#primary-nav ul.unli a.menuactive {
	background-color: #DBE7F2;
}
/* Styling the basic apperance of the menuparents - here styled the same on hover (fixes IE bug) */
#primary-nav ul.unli li .menuparent,
#primary-nav ul.unli li .menuparent:hover,
#primary-nav ul.unli li .menuparent,
#primary-nav .menuactive.menuparent .unli .menuactive.menuparent .menuactive.menuparent {
	background-image: url([[root_url]]/uploads/NCleanBlue/arrow.gif);
	background-position: center right;
	background-repeat: no-repeat;
}
/* The magic - set to work for up to a 3 level menu, but can be increased unlimited */
#primary-nav ul,
#primary-nav li:hover ul,
#primary-nav li:hover ul ul,
#primary-nav li:hover ul ul ul,
#primary-nav li.menuparenth ul,
#primary-nav li.menuparenth ul ul,
#primary-nav li.menuparenth ul ul ul {
	display: none;
}
#primary-nav li:hover ul,
#primary-nav ul li:hover ul,
#primary-nav ul ul li:hover ul,
#primary-nav ul ul ul li:hover ul,
#primary-nav li.menuparenth ul,
#primary-nav ul li.menuparenth ul,
#primary-nav ul ul li.menuparenth ul,
#primary-nav ul ul ul li.menuparenth ul {
	display: block;
}
/* IE Hacks */
#primary-nav li li {
	float: left;
	clear: both;
}
#primary-nav li li a {
	height: 1%;
}
/*************** End Menu *****************/
/* ------------ News Module ------------ */
#news {
	padding: 10px;
}
.NewsSummary {
}
.NewsSummaryPostdate,
.NewsSummaryCategory,
.NewsSummaryAuthor {
	font-style: italic;
	font-size: 0.8em;
}
.NewsSummaryLink {
	margin: 2px 0;
}
.NewsSummaryContent {
	margin: 10px 0;
}
.NewsSummaryMorelink {
	margin: 5px 0 15px;
}
/* ------------ End News Module ------------ */
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Layout NCleanBlue'); // id = 49
$css->set_description('Main layout rules used in NCleanBlue Design');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
[[strip]]

[[* /*! normalize.css v2.1.3 | MIT License | git.io/normalize */ *]]

[[* /* ==========================================================================
 HTML5 display definitions
 ========================================================================== */ *]]

[[* /**
 * Correct `block` display not defined in IE 8/9.
 */ *]]

article, aside, details, figcaption, figure, footer, header, hgroup, main, nav, section, summary {
	display: block;
}

[[* /**
 * Correct `inline-block` display not defined in IE 8/9.
 */ *]]

audio, canvas, video {
	display: inline-block;
}

[[* /**
 * Prevent modern browsers from displaying `audio` without controls.
 * Remove excess height in iOS 5 devices.
 */ *]]

audio:not([controls]) {
	display: none;
	height: 0;
}

[[* /**
 * Address `[hidden]` styling not present in IE 8/9.
 * Hide the `template` element in IE, Safari, and Firefox < 22.
 */ *]]

[hidden], template {
	display: none;
}

[[* /* ==========================================================================
 Base
 ========================================================================== */ *]]

[[* /**
 * 1. Set default font family to sans-serif.
 * 2. Prevent iOS text size adjust after orientation change, without disabling
 *    user zoom.
 */ *]]

html {
	font-family: sans-serif; [[* /* 1 */ *]]
	-ms-text-size-adjust: 100%; [[* /* 2 */ *]]
	-webkit-text-size-adjust: 100%; [[* /* 2 */ *]]
}

[[* /**
 * Remove default margin.
 */ *]]

body {
	margin: 0;
}

[[* /* ==========================================================================
 Links
 ========================================================================== */ *]]

[[* /**
 * Remove the gray background color from active links in IE 10.
 */ *]]

a {
	background: transparent;
}

[[* /**
 * Address `outline` inconsistency between Chrome and other browsers.
 */ *]]

a:focus {
	outline: thin dotted;
}

[[* /**
 * Improve readability when focused and also mouse hovered in all browsers.
 */ *]]

a:active, a:hover {
	outline: 0;
}

[[* /* ==========================================================================
 Typography
 ========================================================================== */ *]]

[[* /**
 * Address variable `h1` font-size and margin within `section` and `article`
 * contexts in Firefox 4+, Safari 5, and Chrome.
 */ *]]

h1 {
	font-size: 2em;
	margin: 0.67em 0;
}

[[* /**
 * Address styling not present in IE 8/9, Safari 5, and Chrome.
 */ *]]

abbr[title] {
	border-bottom: 1px dotted;
}

[[* /**
 * Address style set to `bolder` in Firefox 4+, Safari 5, and Chrome.
 */ *]]

b, strong {
	font-weight: bold;
}

[[* /**
 * Address styling not present in Safari 5 and Chrome.
 */ *]]

dfn {
	font-style: italic;
}

[[* /**
 * Address differences between Firefox and other browsers.
 */ *]]

hr {
	-moz-box-sizing: content-box;
	box-sizing: content-box;
	height: 0;
}

[[* /**
 * Address styling not present in IE 8/9.
 */ *]]

mark {
	background: #ff0;
	color: #000;
}

[[* /**
 * Correct font family set oddly in Safari 5 and Chrome.
 */ *]]

code, kbd, pre, samp {
	font-family: monospace, serif;
	font-size: 1em;
}

[[* /**
 * Improve readability of pre-formatted text in all browsers.
 */ *]]

pre {
	white-space: pre-wrap;
}

[[* /**
 * Set consistent quote types.
 */ *]]

q {
	quotes: "\\201C" "\\201D" "\\2018" "\\2019";
}

[[* /**
 * Address inconsistent and variable font size in all browsers.
 */ *]]

small {
	font-size: 80%;
}

[[* /**
 * Prevent `sub` and `sup` affecting `line-height` in all browsers.
 */ *]]

sub, sup {
	font-size: 75%;
	line-height: 0;
	position: relative;
	vertical-align: baseline;
}

sup {
	top: -0.5em;
}

sub {
	bottom: -0.25em;
}

[[* /* ==========================================================================
 Embedded content
 ========================================================================== */ *]]

[[* /**
 * Remove border when inside `a` element in IE 8/9.
 */ *]]

img {
	border: 0;
}

[[* /**
 * Correct overflow displayed oddly in IE 9.
 */ *]]

svg:not(:root) {
	overflow: hidden;
}

[[* /* ==========================================================================
 Figures
 ========================================================================== */ *]]

[[* /**
 * Address margin not present in IE 8/9 and Safari 5.
 */ *]]

figure {
	margin: 0;
}

[[* /* ==========================================================================
 Forms
 ========================================================================== */ *]]

[[* /**
 * Define consistent border, margin, and padding.
 */ *]]

fieldset {
	border: 1px solid #c0c0c0;
	margin: 0 2px;
	padding: 0.35em 0.625em 0.75em;
}

[[* /**
 * 1. Correct `color` not being inherited in IE 8/9.
 * 2. Remove padding so people aren''t caught out if they zero out fieldsets.
 */ *]]

legend {
	border: 0; [[* /* 1 */ *]]
	padding: 0; [[* /* 2 */ *]]
}

[[* /**
 * 1. Correct font family not being inherited in all browsers.
 * 2. Correct font size not being inherited in all browsers.
 * 3. Address margins set differently in Firefox 4+, Safari 5, and Chrome.
 */ *]]

button, input, select, textarea {
	font-family: inherit; [[* /* 1 */ *]]
	font-size: 100%; [[* /* 2 */ *]]
	margin: 0; [[* /* 3 */ *]]
}

[[* /**
 * Address Firefox 4+ setting `line-height` on `input` using `!important` in
 * the UA stylesheet.
 */ *]]

button, input {
	line-height: normal;
}

[[* /**
 * Address inconsistent `text-transform` inheritance for `button` and `select`.
 * All other form control elements do not inherit `text-transform` values.
 * Correct `button` style inheritance in Chrome, Safari 5+, and IE 8+.
 * Correct `select` style inheritance in Firefox 4+ and Opera.
 */ *]]

button, select {
	text-transform: none;
}

[[* /**
 * 1. Avoid the WebKit bug in Android 4.0.* where (2) destroys native `audio`
 *    and `video` controls.
 * 2. Correct inability to style clickable `input` types in iOS.
 * 3. Improve usability and consistency of cursor style between image-type
 *    `input` and others.
 */ *]]

button, html input[type="button"], [[* /* 1 */ *]]
input[type="reset"], input[type="submit"] {
	-webkit-appearance: button; [[* /* 2 */ *]]
	cursor: pointer; [[* /* 3 */ *]]
}

[[* /**
 * Re-set default cursor for disabled elements.
 */ *]]

button[disabled], html input[disabled] {
	cursor: default;
}

[[* /**
 * 1. Address box sizing set to `content-box` in IE 8/9/10.
 * 2. Remove excess padding in IE 8/9/10.
 */ *]]

input[type="checkbox"], input[type="radio"] {
	box-sizing: border-box; [[* /* 1 */ *]]
	padding: 0; [[* /* 2 */ *]]
}

[[* /**
 * 1. Address `appearance` set to `searchfield` in Safari 5 and Chrome.
 * 2. Address `box-sizing` set to `border-box` in Safari 5 and Chrome
 *    (include `-moz` to future-proof).
 */ *]]

input[type="search"] {
	-webkit-appearance: textfield; [[* /* 1 */ *]]
	-moz-box-sizing: content-box;
	-webkit-box-sizing: content-box; [[* /* 2 */ *]]
	box-sizing: content-box;
}

[[* /**
 * Remove inner padding and search cancel button in Safari 5 and Chrome
 * on OS X.
 */ *]]

input[type="search"]::-webkit-search-cancel-button, input[type="search"]::-webkit-search-decoration {
	-webkit-appearance: none;
}

[[* /**
 * Remove inner padding and border in Firefox 4+.
 */ *]]

button::-moz-focus-inner, input::-moz-focus-inner {
	border: 0;
	padding: 0;
}

[[* /**
 * 1. Remove default vertical scrollbar in IE 8/9.
 * 2. Improve readability and alignment in all browsers.
 */ *]]

textarea {
	overflow: auto; [[* /* 1 */ *]]
	vertical-align: top; [[* /* 2 */ *]]
}

[[* /* ==========================================================================
 Tables
 ========================================================================== */ *]]

[[* /**
 * Remove most spacing between table cells.
 */ *]]

table {
	border-collapse: collapse;
	border-spacing: 0;
}

[[* /*! HTML5 Boilerplate v4.3.0 | MIT License | http://h5bp.com/ */ *]]

[[* /*
 * What follows is the result of much research on cross-browser styling.
 * Credit left inline and big thanks to Nicolas Gallagher, Jonathan Neal,
 * Kroc Camen, and the H5BP dev community and team.
 */ *]]

[[* /* ==========================================================================
 Base styles: opinionated defaults
 ========================================================================== */ *]]

html {
	color: #222;
	font-size: 1em;
	line-height: 1.4;
}

[[* /*
 * A better looking default horizontal rule
 */ *]]

hr {
	display: block;
	height: 1px;
	border: 0;
	border-top: 1px solid #ccc;
	margin: 1em 0;
	padding: 0;
}

[[* /*
 * Remove the gap between images, videos, audio and canvas and the bottom of
 * their containers: h5bp.com/i/440
 */ *]]

audio, canvas, img, svg, video {
	vertical-align: middle;
}

[[* /*
 * Remove default fieldset styles.
 */ *]]

fieldset {
	border: 0;
	margin: 0;
	padding: 0;
}

[[* /*
 * Allow only vertical resizing of textareas.
 */ *]]

textarea {
	resize: vertical;
}

[[* /* ==========================================================================
 Helper classes
 ========================================================================== */ *]]

[[* /*
 * Hide from both screenreaders and browsers: h5bp.com/u
 */ *]]

.hidden {
	display: none !important;
	visibility: hidden;
}

[[* /*
 * Hide only visually, but have it available for screenreaders: h5bp.com/v
 */ *]]

.visuallyhidden {
	border: 0;
	clip: rect(0 0 0 0);
	height: 1px;
	margin: -1px;
	overflow: hidden;
	padding: 0;
	position: absolute;
	width: 1px;
}

[[* /*
 * Extends the .visuallyhidden class to allow the element to be focusable
 * when navigated to via the keyboard: h5bp.com/p
 */ *]]

.visuallyhidden.focusable:active, .visuallyhidden.focusable:focus {
	clip: auto;
	height: auto;
	margin: 0;
	overflow: visible;
	position: static;
	width: auto;
}

[[* /*
 * Hide visually and from screenreaders, but maintain layout
 */ *]]

.invisible {
	visibility: hidden;
}

[[* /*
 * Clearfix: contain floats
 *
 * For modern browsers
 * 1. The space content is one way to avoid an Opera bug when the
 *    `contenteditable` attribute is included anywhere else in the document.
 *    Otherwise it causes space to appear at the top and bottom of elements
 *    that receive the `clearfix` class.
 * 2. The use of `table` rather than `block` is only necessary if using
 *    `:before` to contain the top-margins of child elements.
 */ *]]

.cf:before, .cf:after {
	content: " "; [[* /* 1 */ *]]
	display: table; [[* /* 2 */ *]]
}

.cf:after {
	clear: both;
}

[[* /* =====================================
 BASE STYLES
 ===================================== */ *]]

[[* /*
 * 1. Remove default vertical scrollbar in IE6/7/8/9
 * 2. Allow only vertical resizing
 */ *]]
textarea {
	overflow: auto;
	vertical-align: top;
	resize: vertical
}

ul, ol {
	margin: 1em 0;
	padding: 0 0 0 40px
}

dd {
	margin: 0 0 0 40px
}

nav ul, nav ol {
	list-style: none;
	list-style-image: none;
	margin: 0;
	padding: 0
}

[[* /* Redeclare monospace font family */ *]]
pre, code, kbd, samp {
	font-family: monospace, serif;
	_font-family: courier new, monospace;
	font-size: 1em
}

[[* /* Improve readability of pre-formatted text in all browsers */ *]]
pre {
	white-space: pre;
	white-space: pre-wrap;
	word-wrap: break-word
}

q {
	quotes: none
}

q:before, q:after {
	content: "";
	content: none
}

small {
	font-size: 85%
}

[[* /* correct text resizing */ *]]
html {
	font-size: 100%;
	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%
}

body {
	margin: 0;
	font-size: 1em;
	-webkit-font-smoothing: antialiased;
}

[[* /* =====================================
 12 COLUMN GRID
 ===================================== */ *]]

[[* /* ==========================================================================
 12 Column Grid System based on the 1140px Grid V2
 by Andy Taylor http://cssgrid.net

 Extended by Goran Ilic http://www.ich-mach-das.at
 https://github.com/Stikki/Yetti/blob/master/static/css/yetti-grid.css
 ========================================================================== */ *]]

.container {
	padding-left: 10px;
	padding-right: 10px;
}

.row {
	width: 100%;
	max-width: 1440px;
	margin: 0 auto;
	position: relative;
}

.row:before, .row:after, .form-row:before, .form-row:after {
	content: " ";
	display: table;
}

.row:after, .form-row:after {
	clear: both;
}

[[* /* ==========================================================================
 Base 12 Column Grid
 ========================================================================== */ *]]

.full {
	width: 100%;
	display: block;
}

.half, .third, .two-third, .quarter, .three-quarter, .fifth, .two-fifth, .three-fifth, .four-fifth {
	float: left;
}

.half {
	width: 50%;
}

.third {
	width: 33.33%;
}

.two-third {
	width: 66.66%;
}

.quarter {
	width: 25%;
}

.three-quarter {
	width: 75%;
}

.fifth {
	width: 20%;
}

.two-fifth {
	width: 40%;
}

.three-fifth {
	width: 60%;
}

.four-fifth {
	width: 80%
}

[[* /* Animate position of columns */ *]]
.row [class*="-col"] {
	-webkit-transition:all .4s ease;
	-moz-transition:all .4s ease;
	-o-transition:all .4s ease;
	-ms-transition:all .4s ease;
	transition:all .4s ease;
}

@media only screen and (min-width: 768px) {

	.container {
		padding-left: 20px;
		padding-right: 20px;
	}

	[[* /* ==========================================================================
	 Base 12 Column Grid
	 ========================================================================== */ *]]

	.col, .one-col, .two-col, .three-col, .four-col, .five-col, .six-col, .seven-col, .eight-col, .nine-col, .ten-col, .eleven-col {
		margin-left: 3.8%;
		float: left;
		min-height: 1px;
		position: relative;
	}
	.row .one-col {
		width: 4.85%;
	}
	.row .two-col {
		width: 13.45%;
	}
	.row .three-col {
		width: 22.05%;
	}
	.row .four-col {
		width: 30.75%;
	}
	.row .five-col {
		width: 39.45%;
	}
	.row .six-col {
		width: 48.1%;
	}
	.row .seven-col {
		width: 56.75%;
	}
	.row .eight-col {
		width: 65.4%;
	}
	.row .nine-col {
		width: 74.05%;
	}
	.row .ten-col {
		width: 82.7%;
	}
	.row .eleven-col {
		width: 91.35%;
	}
	.row .twelve-col {
		width: 100%;
		margin-left: 0;
	}
	.row [class*="-col"]:first-child, .row [class*="-col"].first {
		margin-left: 0;
	}

	[[* /* ==========================================================================
	 Offset Space
	 ========================================================================== */ *]]

	.row .offset-one {
		margin-left: 8.65% !important;
	}
	.row .offset-two {
		margin-left: 17.25% !important;
	}
	.row .offset-three {
		margin-left: 25.85% !important;
	}
	.row .offset-four {
		margin-left: 34.55% !important;
	}
	.row .offset-five {
		margin-left: 43.25% !important;
	}
	.row .offset-six {
		margin-left: 51.8% !important;
	}
	.row .offset-seven {
		margin-left: 60.55% !important;
	}
	.row .offset-eight {
		margin-left: 69.2% !important;
	}
	.row .offset-nine {
		margin-left: 77.85% !important;
	}
	.row .offset-ten {
		margin-left: 86.5% !important;
	}
	.row .offset-eleven {
		margin-left: 95.15% !important;
	}

	[[* /* ==========================================================================
	 Push & Pull Space
	 ========================================================================== */ *]]

	.row .push-one, .row .push-two, .row .push-three, .row .push-four, .row .push-five, .row .push-six, .row .push-seven, .row .push-eight,
	.row .push-nine, .row .push-ten, .row .push-eleven, .row .pull-one, .row .pull-two, .row .pull-three, .row .pull-four, .row .pull-five,
	.row .pull-six, .row .pull-seven, .row .pull-eight, .row .pull-nine, .row .pull-ten, .row .pull-eleven {
		position: relative;
		margin-left: 0;
	}

	.row .push-one {
		left: 8.65%;
	}
	.row .push-two {
		left: 17.25%;
	}
	.row .push-three {
		left: 25.85%;
	}
	.row .push-four {
		left: 34.55%;
	}
	.row .push-five {
		left: 43.25%;
	}
	.row .push-six {
		left: 51.8%;
	}
	.row .push-seven {
		left: 60.55%;
	}
	.row .push-eight {
		left: 69.2%;
	}
	.row .push-nine {
		left: 77.85%;
	}
	.row .push-ten {
		left: 86.5%;
	}
	.row .push-eleven {
		left: 95.15%;
	}

	.row .pull-one {
		right: 4.85%;
	}
	.row .pull-two {
		right: 13.45%;
	}
	.row .pull-three {
		right: 22.05%;
	}
	.row .pull-four {
		right: 30.75%;
	}
	.row .pull-five {
		right: 39.45%;
	}
	.row .pull-six {
		right: 48%;
	}
	.row .pull-seven {
		right: 56.75%;
	}
	.row .pull-eight {
		right: 65.4%;
	}
	.row .pull-nine {
		right: 74.05%;
	}
	.row .pull-ten {
		right: 82.7%;
	}
	.row .pull-eleven {
		right: 91.35%;
	}

}

[[/strip]]
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Simplex Core');
$css->set_description('Simplex Theme core Stylesheet, containing 12 column grid system and HTML5 resets (normalize.css)');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
[[strip]]

[[* APPEARANCE *]]
[[*
	/**
	 * @copyright CMS Made Simple 2014
	 * @author Goran Ilic (uniqu3e@gmail.com)
	 * @version 1.1 (CMSMS 2.0 Package)
	 *
	 * Simplex Theme comes with 2 predefined Style variations, one is a "boxed" style as seen in
	 * default installation which is controle with "boxed" ID that is set in Simplex Theme <body> tag.
	 * If you remove this ID, a grey background on page body will be removed and layout will no longer
	 * be wrapped inside a "box" but appear in a single background color which is by default white.
	 *
	 * Besides there are also predefined class names and styles that you can use on <body> tag to
	 * change alignment of complete layout/page.
	 * If you rightaligned class to body (example: <body class='rightaligned and other classes'>)
	 * then whole page layout will be positioned to right window side instead of centered position
	 * and with class leftaligned the page layout will be positioned to left.
	 *
	 * Maximum width of page layout is preset to 1440px in Simplex Core stylesheet, you can change this
	 * by adding a new rule in this stylesheet with a class .row (Example: .row { max-width: 1080px; }).
	 * If you prefer a full width layout simply add fullwidth class to body tag of Simplex Template.
	 * This class will reset max-width limitation and force the page layout to full window width with
	 * spacing on left and right of 30px.
	 *
	 * Browser Support:
	 * Simplex Theme was tested in common modern Browser and IE8 (with gracefull fallback).
	 *
	 * Grid usage:
	 * Simplex is using a custom Yetti Framework 12 column grid (https://github.com/Stikki/Yetti/tree/master)
	 * based on Andy Taylors (http://cssgrid.net) 1140px Grid.
	 *
	 * Using the grid system is fairly simple. Make sure that grid columns
	 * are wrapped inside a element with .row class.
	 * When grid columns are inside a row element, floats are auto cleared,
	 * therefore you do not need anything like some empty clear element ie. <div class="clear"></div>
	 * Grid columns have a spacing (margin-left) of 3.8% of the layout, whereby first column after
	 * .row opening element will have no spacing (margin-left).
	 * Grid columns are only applied to Browser and Screen size which are greater then 768px;
	 *
	 * Example (three column row):
	 *
	 * <!-- container has a preset padding to left and right with 20px -->
	 * <div class="container">
	 *     <!-- clears floating row of columns, sets maximum width of 1440px -->
	 *     <div class="row some-class-to-apply-styles">
	 *         <!--
	 *             four-col explanation: a simple math, grid is built out of 12 columns, so we say we want
	 *             a grid column in size of four columns width therefore the name four- and to fill
	 *             our .row it is three times four-col column makes twelve columns (3 x 4 = 12)
	 *         -->
	 *         <div class="four-col my-class">
	 *             Some content
	 *         </div>
	 *         <div class="four-col my-class">
	 *             Some content
	 *         </div>
	 *         <div class="four-col my-class">
	 *             Some content
	 *         </div>
	 *     </div>
	 *     <div class="row">
	 *         <div class="six-col">
	 *             Half width content
	 *         </div>
	 *         <div class="six-col">
	 *             Half width content
	 *         </div>
	 *     </div>
	 * </div>
	 *
	 */
*]]

[[* /* assign the images path to a variable */ *]]
[[capture assign='path']][[uploads_url]]/simplex/images[[/capture]]
[[capture assign='font']][[uploads_url]]/simplex/fonts[[/capture]]

[[* /* --- COLORS --- */ *]]

[[assign var='light_grey' value='#f1f1f1']]
[[assign var='grey' value='#e9e9e9']]
[[assign var='dark_grey' value='#555' scope=global]]
[[assign var='white' value='#fff']]
[[assign var='orange' value='#1e60ac' scope=global]]
[[assign var='dark_orange' value='#1e60ac']]
[[assign var='yellow' value='#fdbd34']]

[[* /* =====================================
 ICON FONT
 ===================================== */ *]]
[[* /* Will fail on Windows Phone 7, sorry developer life sucks */ *]]
@font-face {
	font-family: 'simplex';
	src: url('[[\$font]]/simplex.eot');
	src: url('[[\$font]]/simplex.eot?#iefix') format('embedded-opentype'),
		url('[[\$font]]/simplex.woff') format('woff'),
		url('[[\$font]]/simplex.ttf') format('truetype'),
		url('[[\$font]]/simplex.svg#simplex') format('svg');
	font-weight: normal;
	font-style: normal;
}

[class^="icon-"], [class*=" icon-"] {
	font-family: 'simplex';
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.icon-arrow-up:before {
	content: "\\e600";
}

.icon-arrow-left:before {
	content: "\\e601";
}

.icon-search:before {
	content: "\\e603";
}

.icon-printer:before {
	content: "\\e604";
}

.icon-linkedin:before {
	content: "\\e605";
}

.icon-pinterest:before {
	content: "\\e606";
}

.icon-youtube:before {
	content: "\\e607";
}

.icon-facebook:before {
	content: "\\e608";
}

.icon-google:before {
	content: "\\e609";
}

.icon-twitter:before {
	content: "\\e60a";
}

.icon-link:before {
	content: "\\e602";
}

[[* /* =====================================
 GENERAL STYLES
 ===================================== */ *]]
body {
	background: [[\$white]];
	font-family: 'Noto Sans', sans-serif;
	font-size: 1em; [[* /* base browser font size: 16px, now do math "XX / 16 = ??" where XX is desired font size */ *]]
	color: [[\$dark_grey]];
	line-height: 1.5;
}

[[* /* add this class to <body> to align the layout to left instead of centered */ *]]
.leftaligned {
	margin-left: 0;
}

[[* /* add this class to <body> to align the layout to right instead of centered */ *]]
.rightaligned {
	margin-right: 0;
}

[[* /* you can change appearance of the page by adding or removing #boxed id to <body> tag.
 * By removing #boxed ID, page will no longer be wrapped in a wrapper
 */ *]]
body#boxed {
	background: #f2f2f2 url([[\$path]]/body-background.png) repeat;
}

[[* /* add this class to <body> to make this layout full window width */ *]]
body.fullwidth .row {
	max-width: none;
}

a img {
	border: none;
}

[[* /* you can use these classes to align images to left or right */ *]]
.right {
	float: right;
}

.left {
	float: left;
}

[[* /* if image needs some space add this class to img tag
 * so at the end a left floating image would be <img src='some.jpg' class='left spacing' alt='foo' />
 */ *]]
.spacing {
	margin: 15px;
}

.spacing.left {
	margin-right: 0;
}

.spacing.right {
	margin-left: 0;
}

[[* /* or add a 2 px border to image or something, change as you need it */ *]]
.border {
	border: 2px solid [[\$grey]];
}

[[* /* some styling for code chunks */ *]]
pre, code, kbd, samp {
	font-family: Consolas, 'Andale Mono WT', 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', monospace;
	color: [[\$dark_grey]];
}

pre code {
	line-height: 1.4;
	font-size: .8125em;
}

pre {
	padding: 10px;
	margin: 10px 0;
	overflow: auto;
	width: 93%;
	background: [[\$light_grey]];
	border-radius: 6px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	-o-border-radius: 6px;
}

[[* /* target IE7 and IE6 */ *]]
*:first-child+ html pre {
	padding-bottom: 20px;
	overflow-y: hidden;
	overflow: visible;
	overflow-x: auto;
}

* html pre {
	padding-bottom: 20px;
	overflow: visible;
	overflow-x: auto;
}

[[* /* horizontal ruler */ *]]
hr {
	border: solid [[\$grey]];
	border-width: 1px 0 0 0;
	clear: both;
	margin: 10px 0 30px 0;
	height: 0;
}

[[* /* =====================================
 COMMON TYPOGRAPHY
 ===================================== */ *]]

[[* /* link default styles */ *]]
a {
	color: [[\$orange]];
}

a.external {
	text-decoration: none;
}

a:visited {
	color: [[\$dark_orange]];
}

a:hover {
	color: [[\$dark_grey]];
	transition: transform .3s ease-out;
	-webkit-transition: color .3s ease-out;
	-moz-transition: color .3s ease-out;
	-o-transition: color .3s ease-out;
	text-decoration: underline;
}

a:focus {
	outline: thin dotted;
}

a:hover, a:active {
	outline: 0;
}

[[* /* add icon to links with class external */ *]]
a.external:after {
	content: "\\e602";
	padding-left: 4px;
	font-family: 'simplex';
	text-decoration: none;
}

[[* /* default heading styles */ *]]
h1, h2 {
	font-family: 'Oswald', Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
	font-weight: 700;
}

h3, h4, h5, h6 {
	font-weight: 400;
}

h1 {
	color: [[\$orange]];
	margin: 10px 0;
	font-size: 2em; [[* /* 32px */ *]]
	text-transform: uppercase;
}

h2 {
	color: [[\$dark_grey]];
	font-size: 1.75em; [[* /* 28px */ *]]
}

h3 {
	color: [[\$dark_grey]];
	font-size: 1.5em; [[* /* 24px */ *]]
}

h4 {
	color: [[\$orange]];
	font-size: 1.375em; [[* /* 22px */ *]]
}

h5 {
	font-size: 1.25em [[* /* 20px */ *]]
}

h6 {
	font-size: 1.125em; [[* /* 18px */ *]]
}

[[* /* blockquotes and cites */ *]]
blockquote, blockquote p {
	font-size: 1.0625em;
	line-height: 1.5;
	color: [[\$dark_grey]];
	font-style: italic;
	font-family: Georgia, Times New Roman, serif;
}

blockquote {
	margin: 0 0 20px 0;
	padding: 9px 10px 10px 19px;
	border-left: 5px solid [[\$light_grey]];
}

blockquote cite {
	display: block;
	font-size: .941176em;
	color: [[\$dark_grey]];
}

blockquote cite:before {
	content: "\\2014 \\0020";
}

blockquote cite a, blockquote cite a:visited, blockquote cite a:visited {
	font-family: Georgia, Times New Roman, serif;
}

[[* /* =====================================
 LAYOUT
 ===================================== */ *]]
[[* /* wrapping the page in a box */ *]]
.page-wrapper {
	border-top: 5px solid [[\$orange]];
	margin-bottom: 15px;
}

[[* /* you can switch appearance of the page by adding or removing id #boxed to body tag */ *]]
#boxed #wrapper {
	margin-top: 15px;
	border-top: 5px solid [[\$orange]];
	background: [[\$white]];
	box-shadow: 0 0 15px 0 #c6c6c6;
}

#boxed.page-wrapper {
	border-top: none;
}

[[* /* add some spacing to page wrapper */ *]]
.inner-section {
	padding-left: 20px;
	padding-right: 20px;
}

[[* /* ------ HEADER SECTION ------ */ *]]

[[* /* the logo */ *]]
.logo {
	margin-top: 20px;
	text-align: center;
}

.logo a {
	display: block;
}

.top .header {
	border-bottom: 1px solid [[\$light_grey]];
}

[[* /* catchphrase */ *]]
.phrase span {
	font-family: 'Oswald', Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
	text-transform: uppercase;
	color: #ddd;
	font-weight: 700;
	font-size: 1.5em; [[* /* 24px */ *]]
}

[[* /* search */ *]]
.search {
	text-align: right;
}

[[* /* webkit browser add icons to input of type search, we dont want it here now */ *]]
input.search-input::-webkit-search-decoration, input.search-input::-webkit-search-results-button,
input.search-input::-webkit-search-results-decoration {
	-webkit-appearance: none;
}

.search .icon-search {
	margin-left: -25px;
	display: inline-block;
	height: 24px;
	line-height: 24px;
	text-align: center;
	width: 24px;
	position: relative;
	z-index: 10;
	color: #ddd;
	top: 3px;
}

.search ::-webkit-input-placeholder,
.search ::-moz-placeholder,
.search input[placeholder] {
	line-height: normal;
}

[[* /* styling the search input field */ *]]
input.search-input {
	border: 1px solid [[\$light_grey]];
	line-height: normal;
	outline: 0;
	padding: 6px 0 6px .5%;
	font-size: .6875em; [[* /* 11px */ *]]
	color: [[\$dark_grey]];
	transition: all .35s ease-in-out;
	-webkit-transition: all .35s ease-in-out;
	-moz-transition: all .35s ease-in-out;
	-o-transition: all .35s ease-in-out;
	max-width: 99.5%;
}

input.search-input:focus {
	border: 1px solid [[\$orange]];
	box-shadow: 0 0 3px [[\$orange]];
	-webkit-box-shadow: 0 0 3px [[\$orange]];
	-moz-box-shadow: 0 0 3px [[\$orange]];
	-o-box-shadow: 0 0 3px [[\$orange]];
}

[[* /* ------ NAVIGATION ------ */ *]]
#main-menu {
	margin-top: 25px;
}

[[* /* --- FIRST LEVEL --- */ *]]
#main-menu > li {
	display: block;
	border-bottom: 1px dotted [[\$light_grey]];
	position: relative;
}

#main-menu > li:last-child {
	border-bottom: none;
}

#main-menu > li > a,
#main-menu > li.sectionheader > span {
	font-family: 'Oswald', Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
	text-transform: uppercase;
	color: [[\$dark_grey]];
	text-decoration: none;
	font-size: 1.0625em; [[* /* 17px */ *]]
	font-weight: 700;
	cursor: pointer;
	padding: 8px 0;
	display: block;
	position: relative;
}

#main-menu > li.current > a,
#main-menu > li.current.sectionheader > span,
#main-menu > li:hover > a,
#main-menu > li.sectionheader:hover > span {
	color: [[\$dark_orange]];
}

[[* /* --- SECOND LEVEL --- */ *]]
#main-menu > li > ul,
#main-menu > li > ul > li > ul [[* /* third level */ *]] {
	position: absolute;
	left: -999em;
}

#main-menu > li:hover > ul,
#main-menu > li.active > ul,
#main-menu > li > ul > li:hover > ul, [[* /* third level */ *]]
#main-menu > li > ul > li.active > ul {
	position: relative;
	left: 0;
}

#main-menu > li > ul > li > a,
#main-menu > li > ul > li.sectionheader > span,
#main-menu > li > ul > li > ul > li > a, [[* /* third level */ *]]
#main-menu > li > ul > li > ul > li.sectionheader > span {
	text-decoration: none;
	color: [[\$dark_grey]];
	text-transform: uppercase;
	display: block;
	padding: 4px 0;
}

#main-menu > li > ul > li:hover > a,
#main-menu > li > ul > li.sectionheader:hover > span,
#main-menu > li > ul > li > ul > li:hover > a,
#main-menu > li > ul > li > ul > li.sectionheader:hover > span {
	color: #999;
}

[[* /* --- THIRD LEVEL --- */ *]]
#main-menu > li > ul > li > ul > li > a,
#main-menu > li > ul > li > ul > li.sectionheader > span {
	padding-left: 15px;
	font-size: .875em;
	text-transform: none;
}

[[* /* --- PARENT INDICATOR --- */ *]]
#main-menu > li > a i,
#main-menu > li > ul > li > a i,
#main-menu > li.sectionheader > span i,
#main-menu > li > ul > li.sectionheader > span i {
	float: right;
	position: relative;
	padding-top: 6px;
	-webkit-transform: rotate(0deg);
	-moz-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
	-o-transform: rotate(0deg);
	transform: rotate(0deg);
	-webkit-transition: -webkit-transform 250ms ease-out 0s;
	-moz-transition: -moz-transform 250ms ease-out 0s;
	-o-transition: -o-transform 250ms ease-out 0s;
	transition: transform 250ms ease-out 0s;
}

#main-menu > li:hover > a i,
#main-menu > li.active > a i,
#main-menu > li > ul > li:hover > a i,
#main-menu > li > ul > li.active > a i,
#main-menu > li.sectionheader:hover > span i,
#main-menu > li.active.sectionheader > span i,
#main-menu > li > ul > li.sectionheader:hover > span i,
#main-menu > li > ul > li.active.sectionheader > span i {
	-webkit-transform: rotate(-90deg);
	-moz-transform: rotate(-90deg);
	-ms-transform: rotate(-90deg);
	-o-transform: rotate(-90deg);
	transform: rotate(-90deg);
}

[[* /* ------ CONTENT AREA ------ */ *]]
.content-wrapper {
	padding-top: 20px;
}

.content-top {
	font-family: Georgia, Times New Roman, serif;
	color: [[\$dark_grey]];
	font-style: italic;
	line-height: 20px;
	position: relative;
}

.content-top .title-border {
	content: '';
	height: 1px;
	display: block;
	width: 100%;
	border-bottom: 1px dotted #ddd;
	position: absolute;
	top: 50%;
}

[[* /* breadcrumbs */ *]]
.breadcrumb {
	display: inline-block;
	background: [[\$white]];
	width: auto;
	padding-right: 6px;
	z-index: 1;
	position: relative;
}

.breadcrumb a {
	color: [[\$dark_grey]];
	display: inline-block;
	width: auto;
	background: [[\$white]];
}

[[* /* print button */ *]]
a.printbutton {
	display: none;
}


[[* /* news module summary -> content */ *]]
.content .news-summary span.heading {
	display: none;
}

.content .news-article {
	margin-bottom: 15px;
	padding-bottom: 15px;
	border-bottom: 1px dotted [[\$grey]];
}

.content .news-summary ul.category-list {
	margin: 15px 0;
}

.content .news-summary ul.category-list li a, .news-summary ul.category-list li span {
	border-radius: 4px;
}

.news-summary ul.category-list li span {
	opacity: .4;
}

[[* /* news module summary -> sitewide (content + sidebar) */ *]]
[[* /* article heading */ *]]
.news-article h2 {
	margin: 0 0 15px 0;
}

.news-article h2 a {
	font-family: 'Oswald', Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
	text-transform: uppercase;
	color: [[\$dark_grey]];
	font-size: 16px;
	text-decoration: none;
	font-weight: 700;
}

[[* /* date circle, well square for IE  */ *]]
.news-article .date {
	background: [[\$orange]];
	color: [[\$white]];
	display: block;
	float: left;
	width: 40px;
	padding: 6px;
	height: 40px;
	border-radius: 26px;
	text-align: center;
	font-family: Georgia, Times New Roman, serif;
}

.news-article .day {
	font-size: 20px;
	line-height: 1;
	padding-bottom: 2px;
	font-style: italic;
	display: block;
}

.news-article.month {
	font-size: 11px;
	display: block
}

[[* /* author and category */ *]]
.news-article .author, .news-article .category {
	font-family: Georgia, Times New Roman, serif;
	display: block;
	padding-left: 60px;
	font-size: 11px;
	font-style: italic;
}

[[* /* category list on top of summary */ *]]
.news-summary ul.category-list {
	margin: 15px 0 -1px 0;
	padding: 0;
	list-style: none;
}

.news-summary ul.category-list li {
	float: left;
	display: block;
	width: auto;
	margin-right: 5px;
}

.news-summary ul.category-list li a, .news-summary ul.category-list li span {
	display: block;
	color: [[\$dark_grey]];
	padding: 4px 8px;
	background: [[\$light_grey]];
	border-radius: 4px 4px 0 0;
	text-decoration: none;
	font-size: 11px;
	text-transform: uppercase;
}

.news-summary ul.category-list li a:hover {
	color: [[\$orange]];
}

.news-summary .paginate {
	font: italic 11px/1.2 Georgia, Times New Roman, serif;
}

.news-summary .paginate a {
	padding: 0 3px;
}

.news-meta {
	background: [[\$light_grey]];
	padding: 10px;
	margin: 10px 0;
}

[[* /* more link */ *]]
.more, .more a,
[[* /* back link */ *]]
.back, .back a,
[[* /* previous, next links */ *]]
.previous a, .next a, .previous, .next {
	font: italic 12px/1.3 Georgia, Times New Roman, serif;
	color: [[\$dark_grey]];
	text-decoration: none;
}

[[* /* hover behavior of more, next, previous links */ *]]
.more a:hover, .back a:hover, .previous a:hover, .next a:hover {
	text-decoration: underline;
}

.previous, .next {
	padding: 6px 0;
}

[[* /* align next link to right */ *]]
.previous {
	float: left;
}

.next {
	float: right;
}

[[* /* ------ SIDEBAR AREA ------ */ *]]

[[* /* news module summary -> sidebar */ *]]
.sidebar .news-summary span.heading {
	position: relative;
	color: [[\$dark_grey]];
	font: normal 1em/1.25 Georgia, Times New Roman, serif;
	margin: 0 0 15px 0;
	display: block;
}

.sidebar .news-summary span.heading:after {
	content: '';
	height: 1px;
	display: block;
	width: 100%;
	border-bottom: 1px dotted #ddd;
	position: absolute;
	top: 50%;
}

.sidebar .news-summary .heading span {
	display: inline-block;
	width: auto;
	background: [[\$white]];
	padding-right: 6px;
	position: relative;
	z-index: 10;
}

.sidebar .news-article {
	padding: 15px;
	position: relative;
	background: [[\$light_grey]];
	margin-bottom: 20px;
	border-radius: 0 0 6px 0;
	font-size: .8125em; [[* /* 13px */ *]]
}

[[* /* creating a bubble box with css3 */ *]]
.sidebar .news-article:before {
	content: '';
	position: absolute;
	bottom: -15px;
	right: 25px;
	width: 10px;
	height: 35px;
	-webkit-transform: rotate(55deg) skewY(55deg);
	-moz-transform: rotate(55deg) skewY(55deg);
	-o-transform: rotate(55deg) skewY(55deg);
	-ms-transform: rotate(55deg) skewY(55deg);
	transform: rotate(55deg) skewY(55deg);
	background: [[\$light_grey]];
}

.lt-ie9 .sidebar .news-article:before {
	display: none;
}

[[* /* ------ FOOTER AREA ------ */ *]]
[[* /* footer wrapper */ *]]
.footer {
	position: relative;
	border-top: 8px solid [[\$light_grey]];
	margin: 25px 0 10px 0;
	padding-top: 20px;
	padding-bottom: 20px;
}

.footer:before {
	content: ' ';
	border-top: 2px dotted [[\$white]];
	border-bottom: 2px dotted [[\$white]];
	height: 4px;
	display: block;
	position: absolute;
	width: 100%;
	top: -8px;
	left: 0;
}

[[* /* copyright text */ *]]
.copyright {
	padding-top: 15px;
}

.copyright-info {
	color: [[\$dark_grey]];
	font-size: .6875em; [[* /* 11px */ *]]
}

[[* /* social icons */ *]]
.footer ul.social {
	padding: 0;
	margin: 0;
	list-style: none;
	text-align: center;
}

.footer .social li {
	display: inline;
	margin: 0;
	padding: 0;
	margin-right: 6px;
}

.footer .social li a {
	display: inline-block;
	text-decoration: none;
	font-size: 2.625em;
	line-height: 1;
	color: [[\$dark_grey]];
}

.footer .social li a:hover {
	color: [[\$orange]];
}

.footer .social li a i {
	display: inline-block;
}

[[* /* back to top anchor */ *]]
.back-top a {
	display: inline-block;
	width: 16px;
	height: 16px;
	line-height: 16px;
	padding: 8px;
	border: 5px solid [[\$white]];
	text-decoration: none;
	color: [[\$dark_grey]];
	background-color: [[\$light_grey]];
	border-radius: 500px;
	-webkit-border-radius: 500px;
	-moz-border-radius: 500px;
	-o-border-radius: 500px;
	position: absolute;
	top: -24px;
	left: 50%;
	margin-left: -12px;
	-webkit-transition: all 200ms ease-in-out;
	-moz-transition: all 200ms ease-in-out;
	-ms-transition: all 200ms ease-in-out;
	-o-transition: all 200ms ease-in-out;
	transition: all 200ms ease-in-out;
}

.back-top a:hover {
	background-color: [[\$orange]];
	color: [[\$white]];
	-webkit-transform: scale(1.1);
	-moz-transform: scale(1.1);
	-ms-transform: scale(1.1);
	-o-transform: scale(1.1);
	transform: scale(1.1);
}

[[* /* Footer navigation */ *]]
.footer-navigation {
	padding-top: 15px;
	border-bottom: 1px solid [[\$light_grey]];
}

#footer-menu li > a,
#footer-menu li.sectionheader > span {
	color: [[\$dark_grey]];
	display: block;
	text-decoration: none;
}

#footer-menu li > a:hover,
#footer-menu li > a.current,
#footer-menu li.sectionheader > span:hover,
#footer-menu li.sectionheader > span.current {
	color: [[\$orange]];
}

#footer-menu > li > a,
#footer-menu > li.sectionheader > span {
	font-family: 'Oswald', Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
	text-transform: uppercase;
	text-decoration: none;
	display: block;
}

#footer-menu > li > ul > li > a,
#footer-menu > li > ul > li.sectionheader > span {
	font-size: .875em; [[* /* 14px */ *]]
	padding: 2px 0;
}

#footer-menu > li > ul {
	margin: 15px 0;
}

[[* /* =====================================
 SCREENS BIGGER THAN 768px
 ===================================== */ *]]

@media screen and (min-width: 768px) {

	.lt-768 {
		display: none;
	}

	.logo {
		margin-top: 12px;
		position: relative;
		text-align: left;
	}

	[[* /* having some fun with palm, rotating with css3, will not work in IE */ *]]
	.logo .palm {
		position: absolute;
		top: 5px;
		left: 45px;
		background: url([[\$path]]/palm-circle.png) no-repeat;
		display: block;
		width: 48px;
		height: 48px;
		transition: transform 0.6s ease-out;
		-webkit-transition: -webkit-transform 0.6s ease-out;
		-moz-transition: -moz-transform 0.6s ease-out;
		-o-transition: -o-transform 0.6s ease-out;
		-webkit-perspective: 1000;
		-webkit-backface-visibility: hidden;
	}

	[[* /* css3 transform rotating palm on hover */ *]]
	.logo a:hover .palm {
		transform: rotate(360deg);
		-webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		-o-transform: rotate(360deg);
	}

	[[* /* ------ NAVIGATION ------ */ *]]

	nav.main-navigation {
		z-index: 990;
		height: 55px;
		line-height: 37px;
		margin-top: 20px;
	}

	#main-menu {
		float: right;
		margin-top: 0;
	}

	[[* /* --- FIRST LEVEL --- */ *]]
	#main-menu > li {
		display: inline-block;
		padding: 0;
		margin: 0 4px;
		border: none;
		position: relative;
	}

	[[* /* PARENT INICATOR */ *]]
	#main-menu > li i {
		display: none;
	}

	.touch-device #main-menu > li i {
		display: inline-block;
		float: none;
	}

	.touch-device #main-menu > li li i {
		float: left;
		display: inline-block;
		margin-right: 8px;
		padding-top: 2px;
		text-align: left;
	}

	.touch-device #main-menu > li:first-child li i {
		float: right;
	}

	#main-menu > li:first-child, #main-menu > li.first {
		margin-left: 0;
	}

	#main-menu > li:last-child, #main-menu > li.last {
		margin-right: 0;
	}

	#main-menu > li > a,
	#main-menu > li.sectionheader span {
		padding: 0 6px 0 10px;
		line-height: 37px;
		font-size: 1em;
	}

	#main-menu > li.parent:hover > a,
	#main-menu > li.sectionheader.parent:hover > span,
	#main-menu > li.parent.active > a,
	#main-menu > li.parent.active > span {
		color: [[\$white]];
		background-color: [[\$dark_grey]];
		background-color: rgba(85, 85, 85, .95);
	}

	[[* /* --- SECOND LEVEL --- */ *]]
	#main-menu > li > ul,
	#main-menu > li > ul > li > ul [[* /* third level */ *]] {
		display: block;
		width: 260px;
	}

	#main-menu > li:hover > ul,
	#main-menu > li.active > ul,
	#main-menu > li > ul > li:hover > ul,
	#main-menu > li > ul > li.active > ul {
		height: auto;
		position: absolute;
		z-index: 9999;
		top: 37px;
		right: 0;
		left: auto;
		display: block;
		border-radius: 3px;
	}

	#main-menu > li:first-child:hover > ul,
	#main-menu > li:first-child.active > ul {
		right: auto;
		left: 0;
	}

	#main-menu > li > ul > li {
		position: relative;
		line-height: 1;
		margin: 0;
		padding-left: 10px;
	}

	#main-menu > li:first-child > ul > li {
		padding-right: 10px;
		padding-left: 0;
	}

	#main-menu > li > ul > li > a,
	#main-menu > li > ul > li.sectionheader > span,
	#main-menu > li > ul > li > ul > li > a,
	#main-menu > li > ul > li > ul > li.sectionheader > span {
		color: [[\$white]];
		display: block;
		text-transform: none;
		line-height: 1.2;
		border-bottom: 1px dotted #858585;
		background-color: [[\$dark_grey]];
		background-color: rgba(90, 90, 90, .98);
		padding: 8px 12px;
		font-size: .875em; [[* /* 14px */ *]]
		text-decoration: none;
	}

	#main-menu > li > ul > li.current > a,
	#main-menu > li > ul > li.current.sectionheader > span,
	#main-menu > li > ul > li > ul > li.current > a,
	#main-menu > li > ul > ul > li > li.current.sectionheader > span {
		color: [[\$orange]];
	}

	[[* /* THIRD LEVEL */ *]]
	#main-menu > li > ul > li:hover > ul,
	#main-menu > li > ul > li.active > ul {
		width: 250px;
		height: auto;
		top: 0;
		right: auto;
		left: -250px;
	}

	#main-menu > li:first-child > ul > li:hover > ul,
	#main-menu > li:first-child > ul > li.active > ul {
		left: auto;
		right: -250px;
	}

	.lt-ie9 #main-menu > li > ul > li:hover > ul,
	.lt-ie9 #main-menu > li > ul > li.active > ul {
		left: -247px;
	}

	#main-menu > li > ul > li:hover > ul:after,
	#main-menu > li > ul > li.active > ul:after {
		content: ' ';
		width: 0px;
		height: 0px;
		border-style: solid;
		border-width: 7px 0 7px 6px;
		border-color: transparent transparent transparent [[\$dark_grey]];
		border-color: transparent transparent transparent rgba(85, 85, 85, .95);
		position: absolute;
		right: -6px;
		top: 12px;
	}

	.lt-ie9 #main-menu > li:first-child > ul > li:hover > ul,
	.lt-ie9 #main-menu > li:first-child > ul > li.active > ul {
		left: auto;
		right: -247px;
	}

	#main-menu > li:first-child > ul > li:hover > ul:after,
	#main-menu > li:first-child > ul > li.active > ul:after {
		left: -10px;
		right: auto;
	}

	#main-menu li ul li a:hover,
	#main-menu li ul li span.sectionheader:hover {
		box-shadow: 0 0 5px rgba(85, 85, 85, .9);
		z-index: 2px;
	}

	#main-menu > ul > li:last-child > a,
	#main-menu > ul > li.sectionheader:last-child > span,
	#main-menu > ul > li > ul > li:last-child > a,
	#main-menu > ul > li > ul > li.sectionheader:last-child > span {
		border-bottom: none;
	}

	.header-bottom {
		height: 55px;
		line-height: 55px;
		padding: 8px 0;
	}

	.phrase-text {
		text-align: left;
	}

	input.search-input {
		height: 17px;
		line-height: 17px;
		width: 100%;
		max-width: 320px;
	}

	input.search-input:focus {
		max-width: 90%;
	}

	[[* /* print button */ *]]
	a.printbutton {
		display: block;
		padding-left: 6px;
		width: 16px;
		height: 16px;
		float: right;
		text-decoration: none;
		color: [[\$dark_grey]];
		background-color: [[\$white]];
		z-index: 1;
		position: relative;
	}

	a.printbutton i {
		display: inline-block;
		-webkit-transform: rotateY(0deg);
		-moz-transform: rotateY(0deg);
		-ms-transform: rotateY(0deg);
		-o-transform: rotateY(0deg);
		transform: rotateY(0deg);
		-webkit-transition: -webkit-transform 250ms ease-out 0s;
		-moz-transition: -moz-transform 250ms ease-out 0s;
		-o-transition: -o-transform 250ms ease-out 0s;
		transition: transform 250ms ease-out 0s;
	}

	a.printbutton:hover {
		color: [[\$orange]];
	}

	a.printbutton:hover i {
		-webkit-transform: rotateY(360deg);
		-moz-transform: rotateY(180deg);
		-ms-transform: rotateY(360deg);
		-o-transform: rotateY(360deg);
		transform: rotateY(360deg);
	}

	[[* /* --- FOOTER --- */ *]]

	.footer ul.social {
		text-align: left;
	}

	.footer .social li a i {
		display: inline-block;
		-webkit-transform: rotateY(0deg);
		-moz-transform: rotateY(0deg);
		-ms-transform: rotateY(0deg);
		-o-transform: rotateY(0deg);
		transform: rotateY(0deg);
		-webkit-transition: -webkit-transform 250ms ease-out 0s;
		-moz-transition: -moz-transform 250ms ease-out 0s;
		-ms-transition: -moz-transform 250ms ease-out 0s;
		-o-transition: -o-transform 250ms ease-out 0s;
		transition: transform 250ms ease-out 0s;
	}

	.footer .social li a:hover i {
		-webkit-transform: rotateY(360deg);
		-moz-transform: rotateY(180deg);
		-ms-transform: rotateY(360deg);
		-o-transform: rotateY(360deg);
		transform: rotateY(360deg);
	}

	[[* /* --- Footer Navigation --- */ *]]

	.footer-navigation {
		border-bottom: none;
	}

	#footer-menu > li {
		float: left;
		display: block;
		position: relative;
		margin-left: 3.8%;
		width: 30.75%;
	}

	#footer-menu > li:first-child {
		margin-left: 0;
	}
}

[[* /* ================================================
 WHEN LAYOUT BREAKS IT'S TIME FOR NEW MEDIA QUERY
 ================================================== */ *]]
@media only screen and (max-width: 780px) {

	.search {
		margin-top: 15px;
	}

	input.search-input {
		width: 100%;
		max-width: 100%;
		float: left;
	}

	input.search-input:focus {
		max-width: none;
	}

	.header-bottom {
		padding-top: 20px;
		text-align: center;
		line-height: inherit;
		padding: 20px 0;
	}


}

@media only screen and (min-width: 940px) and (max-width: 1110px) {

	#main-menu > li {
		margin: 0;
	}

	#main-menu > li > a,
	#main-menu > li.sectionheader span {
		padding: 0 6px;
	}
}

@media only screen and (min-width: 768px) and (max-width: 1050px) {

	.row nav.main-navigation {
		height: auto;
		float: none;
		display: block;
		margin-left: 0;
		width: 100%;
		clear: left;
	}

	#main-menu {
		margin-top: 15px;
		margin-bottom: 15px;
		border-bottom: 1px solid [[\$light_grey]];
		float: none;
		display: block;

	}

	#main-menu > li {
		margin: 0;
		bottom: -1px;
		text-align: center;
		border-bottom: 1px solid [[\$light_grey]];
		border-right: 1px solid [[\$light_grey]];
		border-top: 1px solid [[\$light_grey]];
	}

	#main-menu > li.current {
		border-bottom-color: [[\$white]];
		border-top-color: [[\$orange]];
	}

	#main-menu > li.current > a {
		border-top: 1px solid [[\$orange]];
		line-height: 45px;
	}

	#main-menu > li:first-child {
		border-left: 1px solid [[\$light_grey]];
	}

	#main-menu > li > a,
	#main-menu > li > span {
		line-height: 46px;
		padding-left: 12px;
		padding-right: 6px;
	}

	#main-menu > li:hover > ul,
	#main-menu > li.active > ul {
		top: 45px;
	}

	.header-bottom {
		height: auto;
	}

	.row .seven-col.phrase-text,
	.row .five-col.search {
		display: block;
		float: none;
		width: 100%;
		margin-left: 0;
		text-align: center;
	}
}

[[* /* ================================================
 WINDOWS 8 SNAP VIEW (yeah yeah W3C blah blah)
 ================================================== */ *]]
@-ms-viewport {
	width: device-width;
}

@-o-viewport {
	width: device-width;
}

@-moz-viewport {
	width: device-width;
}

@-webkit-viewport {
	width: device-width;
}

@viewport {
	width: device-width;
}
[[/strip]]
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Simplex Layout');
$css->set_description('Simplex Theme main layout Stylesheet');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
[[strip]]

[[* /* ------ BANNER AREA ------ */  *]]
.banner {
	background: #fefefe;
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZlZmVmZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjQ3JSIgc3RvcC1jb2xvcj0iI2YxZjFmMSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlOWU5ZTkiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(top,  #fefefe 0%, #f1f1f1 47%, #e9e9e9 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fefefe), color-stop(47%,#f1f1f1), color-stop(100%,#e9e9e9));
	background: -webkit-linear-gradient(top,  #fefefe 0%,#f1f1f1 47%,#e9e9e9 100%);
	background: -o-linear-gradient(top,  #fefefe 0%,#f1f1f1 47%,#e9e9e9 100%);
	background: -ms-linear-gradient(top,  #fefefe 0%,#f1f1f1 47%,#e9e9e9 100%);
	background: linear-gradient(to bottom,  #fefefe 0%,#f1f1f1 47%,#e9e9e9 100%);
}

.lt-ie9 .banner {
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefefe', endColorstr='#e9e9e9',GradientType=0 );
}

#sx-slides {
	position: relative;
	overflow: hidden;
	width: 100%;
	margin: 0 auto;
	position: relative;
	height: 345px;
}

#sx-slides > .sequence-canvas {
	height: 100%;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

#sx-slides > .sequence-canvas > li {
	position: absolute;
	width: 100%;
	height: 100%;
	z-index: 1;
	top: -40%;
}

#sx-slides > .sequence-canvas > li img {
	height: 96%;
}

#sx-slides > .sequence-canvas li > * {
	position: absolute;
	-webkit-transition-property: left, bottom, right, top, -webkit-transform, opacity;
	-moz-transition-property: left, bottom, right, top, -moz-opacity;
	-ms-transition-property: left, bottom, right, top, -ms-opacity;
	-o-transition-property: left, bottom, right, top, -o-opacity;
	transition-property: left, bottom, right, top, transform, opacity;
}

#sx-slides .title {
	color: [[\$orange]];
	font-size: 2.25em;
	line-height: 1.1;
	font-weight: 700;
	left: 65%;
	opacity: 0;
	bottom: 22%;
	z-index: 50;
	margin-top: 0;
}

#sx-slides .animate-in .title {
	left: 12%;
	opacity: 1;
	-webkit-transition-duration: 0.8s;
	-moz-transition-duration: 0.8s;
	-ms-transition-duration: 0.8s;
	-o-transition-duration: 0.8s;
	transition-duration: 0.8s;
}

#sx-slides .animate-out .title {
	left: 35%;
	opacity: 0;
	-webkit-transition-duration: 0.3s;
	-moz-transition-duration: 0.3s;
	-ms-transition-duration: 0.3s;
	-o-transition-duration: 0.3s;
	transition-duration: 0.3s;
}

#sx-slides .subtitle {
	margin-top: 0;
	z-index: 5;
	color: [[\$dark_grey]];
	font-family: 'Oswald', Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
	font-weight: 700;
	font-size: 1.8125em;
	left: 35%;
	opacity: 0;
	top: 72%;
}

#sx-slides .animate-in .subtitle {
	left: 20%;
	opacity: 1;
	-webkit-transition-duration: 1.3s;
	-moz-transition-duration: 1.3s;
	-ms-transition-duration: 1.3s;
	-o-transition-duration: 1.3s;
	transition-duration: 1.3s;
}

#sx-slides .animate-out .subtitle {
	left: 65%;
	opacity: 0;
	-webkit-transition-duration: 0.8s;
	-moz-transition-duration: 0.8s;
	-ms-transition-duration: 0.8s;
	-o-transition-duration: 0.8s;
	transition-duration: 0.8s;
}


#sx-slides .image {
	left: 0px;
	position: absolute;
	bottom: 800px;
	-webkit-transform: rotate(-90deg);
	-moz-transform: rotate(-90deg);
	-ms-transform: rotate(-90deg);
	-o-transform: rotate(-90deg);
	transform: rotate(-90deg);
	opacity: 0;
	max-width: 100%;
	height: auto !important;
	max-height: 345px !important;
}

#sx-slides .animate-in .image {
	left: 0%;
	bottom: 0%;
	opacity: 1;
	-webkit-transform: rotate(0deg);
	-moz-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
	-o-transform: rotate(0deg);
	transform: rotate(0deg);
	-webkit-transition-duration: 1s;
	-moz-transition-duration: 1s;
	-ms-transition-duration: 1s;
	-o-transition-duration: 1s;
	transition-duration: 1s;
}

#sx-slides .animate-out .image {
	left: -10px;
	bottom: -1800px;
	opacity: 0;
	-webkit-transform: rotate(-90deg);
	-moz-transform: rotate(-90deg);
	-ms-transform: rotate(-90deg);
	-o-transform: rotate(-90deg);
	transform: rotate(-90deg);
	-webkit-transition-duration: 1s;
	-moz-transition-duration: 1s;
	-ms-transition-duration: 1s;
	-o-transition-duration: 1s;
	transition-duration: 1s;
}

@media only screen and (min-width: 768px) {

	#sx-slides .title {
		font-size: 3em;
	}

	#sx-slides .animate-in .title {
		left: 1%;
	}

	#sx-slides .subtitle {
		font-size: 2.5em;
	}

	#sx-slides .animate-in .subtitle {
		left: 3%;
	}

	#sx-slides .image {
		left: auto;
		right: -10px;
		position: absolute;
		max-width: 70%;
		height: auto !important;
		max-height: 300px !important;
	}

	#sx-slides .animate-in .image {
		left: auto;
		right: 0%;
		bottom: -45%;
	}

	#sx-slides .animate-out .image {
		left: auto;
		bottom: -800px;
	}
}

@media only screen and (min-width: 1050px) {

	#sx-slides {
		height: 340px;
	}

	#sx-slides .title {
		font-size: 3.25em;
		bottom: 15%;
	}

	#sx-slides .animate-in .title {
		left: 2%;
	}

	#sx-slides .subtitle {
		font-size: 2.875em;
		top: 78%
	}

	#sx-slides .animate-in .subtitle {
		left: 5%;
	}

	#sx-slides .image {
		max-width: 90%;
		height: auto !important;
		max-height: 400px !important;
	}
}

[[/strip]]
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Simplex Slideshow');
$css->set_description('Simplex Theme Stylesheet for header slideshow');
$css->set_content($txt);
$css->set_media_types('screen');
$css->save();
$css_list[$css->get_name()] = $css;

$txt = <<<EOT
[[strip]]

[[* /* reset body background and color, just in case */ *]]
body {
    background: #fff;
    color: #000;
    font-family: Georgia, Times New Roman, serif;
    font-size: 12pt
}
[[* /* any element with class noprint or listed below should not be printed */ *]]
.noprint,
.visuallyhidden {
    display: none
}
[[* /* display image as block */ *]]
img {
    display: block;
    float: none
}
[[* /* links arent clickable on paper, lets display url */ *]]
a:link:after {
    content: " (" attr(href) ") ";
}
a {
    text-decoration: underline
}

[[/strip]]
EOT;
$css = new CmsLayoutStylesheet;
$css->set_name('Simplex Print'); // id = 52
$css->set_description('Default Print style rules attached to Simplex Design');
$css->set_content($txt);
$css->set_media_types('print');
$css->save();
$css_list[$css->get_name()] = $css;


// now attach stylesheets to the themes.
verbose_msg(ilang('install_attachstylesheets'));
$css_menuleft_1col_theme->add_stylesheet($css_list['Layout Left sidebar + 1 column']->get_id());
$css_menuleft_1col_theme->add_stylesheet($css_list['Navigation CSSMenu - Vertical']->get_id());
$css_menuleft_1col_theme->add_stylesheet($css_list['Accessibility and cross-browser tools']->get_id());
$css_menuleft_1col_theme->add_stylesheet($css_list['Print']->get_id());
$css_menuleft_1col_theme->add_stylesheet($css_list['Module News']->get_id());
$css_menuleft_1col_theme->add_stylesheet($css_list['Navigation FatFootMenu']->get_id());
$css_menuleft_1col_theme->save();

$css_menutop_2col_theme->add_stylesheet($css_list['Layout Top menu + 2 columns']->get_id());
$css_menutop_2col_theme->add_stylesheet($css_list['Navigation CSSMenu - Horizontal']->get_id());
$css_menutop_2col_theme->add_stylesheet($css_list['Module News']->get_id());
$css_menutop_2col_theme->add_stylesheet($css_list['Print']->get_id());
$css_menutop_2col_theme->add_stylesheet($css_list['Navigation FatFootMenu']->get_id());
$css_menutop_2col_theme->add_stylesheet($css_list['Accessibility and cross-browser tools']->get_id());
$css_menutop_2col_theme->save();

$leftsimple_1col_theme->add_stylesheet($css_list['Layout Left sidebar + 1 column']->get_id());
$leftsimple_1col_theme->add_stylesheet($css_list['Navigation Simple - Vertical']->get_id());
$leftsimple_1col_theme->add_stylesheet($css_list['Module News']->get_id());
$leftsimple_1col_theme->add_stylesheet($css_list['Handheld']->get_id());
$leftsimple_1col_theme->add_stylesheet($css_list['Print']->get_id());
$leftsimple_1col_theme->add_stylesheet($css_list['Accessibility and cross-browser tools']->get_id());
$leftsimple_1col_theme->add_stylesheet($css_list['Navigation FatFootMenu']->get_id());
$leftsimple_1col_theme->save();

$ncleanblue_theme->add_stylesheet($css_list['ncleanblueutils']->get_id());
$ncleanblue_theme->add_stylesheet($css_list['ncleanbluecore']->get_id());
$ncleanblue_theme->add_stylesheet($css_list['Layout NCleanBlue']->get_id());
$ncleanblue_theme->save();

$shadowmenu_left_1col_theme->add_stylesheet($css_list['Layout Left sidebar + 1 column']->get_id());
$shadowmenu_left_1col_theme->add_stylesheet($css_list['Navigation ShadowMenu - Vertical']->get_id());
$shadowmenu_left_1col_theme->add_stylesheet($css_list['Accessibility and cross-browser tools']->get_id());
$shadowmenu_left_1col_theme->add_stylesheet($css_list['Print']->get_id());
$shadowmenu_left_1col_theme->add_stylesheet($css_list['Module News']->get_id());
$shadowmenu_left_1col_theme->add_stylesheet($css_list['Navigation FatFootMenu']->get_id());
$shadowmenu_left_1col_theme->save();

$shadowmenu_tab_2col_theme->add_stylesheet($css_list['Layout Top menu + 2 columns']->get_id());
$shadowmenu_tab_2col_theme->add_stylesheet($css_list['Navigation ShadowMenu - Horizontal']->get_id());
$shadowmenu_tab_2col_theme->add_stylesheet($css_list['Module News']->get_id());
$shadowmenu_tab_2col_theme->add_stylesheet($css_list['Accessibility and cross-browser tools']->get_id());
$shadowmenu_tab_2col_theme->add_stylesheet($css_list['Print']->get_id());
$shadowmenu_tab_2col_theme->add_stylesheet($css_list['Navigation FatFootMenu']->get_id());
$shadowmenu_tab_2col_theme->save();

$simplex_theme->add_stylesheet($css_list['Simplex Print']->get_id());
$simplex_theme->add_stylesheet($css_list['Simplex Core']->get_id());
$simplex_theme->add_stylesheet($css_list['Simplex Layout']->get_id());
$simplex_theme->add_stylesheet($css_list['Simplex Slideshow']->get_id());
$simplex_theme->save();

$topsimple_leftsubnav_1col_theme->add_stylesheet($css_list['Layout Top menu + 2 columns']);
$topsimple_leftsubnav_1col_theme->add_stylesheet($css_list['Navigation Simple - Horizontal']);
$topsimple_leftsubnav_1col_theme->add_stylesheet($css_list['Navigation Simple - Vertical']);
$topsimple_leftsubnav_1col_theme->add_stylesheet($css_list['Accessibility and cross-browser tools']);
$topsimple_leftsubnav_1col_theme->add_stylesheet($css_list['Module News']);
$topsimple_leftsubnav_1col_theme->add_stylesheet($css_list['Print']);
$topsimple_leftsubnav_1col_theme->add_stylesheet($css_list['Navigation FatFootMenu']);
$topsimple_leftsubnav_1col_theme->save();

$content_list = array();
ContentOperations::get_instance()->LoadContentType('content');

/////////////////////////
//  //  HOME PAGE  //  //
/////////////////////////

verbose_msg(ilang('install_createcontentpages'));
// Home / -1 / NCleanBlue  DEFAULT
$contentobj = new Content;
$contentobj->SetName('Home');
$contentobj->SetAlias();
$contentobj->SetMenuText('Home');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$simplex_theme->get_id());
$contentobj->SetTemplateId($template_list['Simplex']);
$contentobj->SetDefaultContent(TRUE); // this is the default page.
$contentobj->SetOwner(1);
$contentobj->SetParentId(-1);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>Congratulations! The installation worked. You now have a fully functional installation of CMS Made Simple and you are <em>almost</em> ready to start building your site.</p><p>If you chose to install the default content, you will see numerous pages available to read.  You should read them thoroughly  as these default pages are devoted to showing you the basics of how to begin working with CMS Made Simple.  On these example pages, templates, and stylesheets many of the features of the default installation of CMS Made Simple are described and demonstrated. You can learn much about the power of CMS Made Simple by absorbing this information.</p><p>To get to the Administration Console you have to login as the administrator (with the username/password you mentioned during the installation process) on your site at http://yourwebsite.com/cmsmspath/admin.  If this is your site click <a title="CMSMS Demo Admin Panel" href="admin">here</a> to login.</p><p>Read about how to use CMS Made Simple in the <a class="external" href="http://docs.cmsmadesimple.org/" title="CMS Made Simple Documentation" target="_blank">documentation</a>. In case you need any help the community is always at your service, in the  <a class="external" href="http://forum.cmsmadesimple.org" title="CMS Made Simple Forum" target="_blank">forum</a> or the <a class="external" href="http://www.cmsmadesimple.org/support/irc" title="Information about the CMS Made Simple IRC channel" target="_blank">IRC</a>.</p><h3>License</h3><p>CMS Made Simple is released under the <a class="external" href="http://www.gnu.org/licenses/licenses.html#GPL" title="General Public License" target="_blank">GPL</a> license and as such you don\'t have to leave a link back to us in these templates or on your site as much as we would like it.</p><p> Some third party add-on modules may include additional license restrictions.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

///////////////////////////////
//  //  HOW CMSMS WORKS  //  //
///////////////////////////////

// How CMSMS Works / -1 / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('How CMSMS Works');
$contentobj->SetAlias();
$contentobj->SetMenuText('How CMSMS Works');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId(-1);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>So how is a web-site created with CMS Made Simple? There are a couple of terms that are central to understanding this.</p><p>You first need to have templates, which is the HTML code for your pages. This is styled with CSS in one or more style sheets that are attached to each template. You then create pages that contain your websites content using one of these templates.</p><p>That doesn\'t sound too hard, does it? Basically you don\'t need to know any HTML or CSS to get a site up with CMS Made Simple. But if you want to customize it to your liking, consider learning some <a class="external" href="http://www.w3schools.com/css/" target="_blank">CSS</a>.</p><p>In the menu to the left you can read more about this, as well as more advanced features like the Menu Manager, additional extensions for adding many kinds of functionality to your site and the Event Manager for managing work flow. Last is a summary of the basic work flow when creating a site with CMS Made Simple.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Templates and stylesheets / How CMSMS Works / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Templates and stylesheets');
$contentobj->SetAlias();
$contentobj->SetMenuText('Templates and stylesheets');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['How CMSMS Works']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>A <em>template</em> is basically the HTML layout, or the design, of a page.  This is the work of the designer. Whatever is in a template is used on every  page that uses that template, meaning that the person editing the content  doesn\'t need any web design skills.</p><p>In the template there are placeholders for content and navigation areas. When  a user is visiting your site the page is automatically generated from the  template and the placeholders are filled with the content.</p><p>The template is the HTML structure. It is then styled in one or more  <em>style sheets</em> that are attached to each template. This styling is done  with CSS. So to get a site look the way you want you should be familiar with HTML and CSS on at least a basic level. But don\'t worry, there are themes with  ready-made templates and style sheets for you to download!</p><p>When you first install CMS Made Simple there are some basic templates that  you can use and customize to your needs. Those templates are described in the section {cms_selflink page=default_templates text=\'Default Templates Explained\'}. The designer of your site can also add new templates to make the site look any way you want. The CMSMS community also shares themes for anyone to download and use at <a class="external" href="http://themes.cmsmadesimple.org" target="_blank">The CMSMS Themes site</a>.</p><h3>Templates and style sheets in the CMSMS Admin Panel</h3><p>In the CMSMS Admin Panel you will find the templates and style sheets in the <strong>Layout</strong> menu.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Pages and navigation / How CMSMS Works / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Pages and navigation');
$contentobj->SetAlias();
$contentobj->SetMenuText('Pages and navigation');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['How CMSMS Works']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>Pages determine the structure of your web-site as seen in the admin Content &raquo; Pages page. Think of a web-site as a set  of pages. These pages are accessed through a menu. You can also link to a page  from within another page.</p><h3>Navigation/Menu</h3><p>The navigation, or the menu, is a set of links that help the user to navigate through  the pages on your web site. These links are automatically created by CMS Made  Simple from the page structure. This hierarchy is what drives the menu you see  on the left of this page.</p><p>Pages can be in several levels, like a tree of generations. The top level in  the menu are the parent pages. Each parent page can have children pages, which  in turn can be parents to other children.</p><p>The page template determines where on a page the navigation is placed.</p><p>You can create any kind of navigation you can dream of by customizing a menu  template for <em>Menu Manager</em>. However, the default templates should work  for most situations as the menu basically is just an unordered list that you  style to your liking with CSS. The web is full of good articles about styling a list of links, one of the best is <a class="external" href="http://css.maxdesign.com.au/listutorial/index.htm" target="_blank">listutorial at maxdesign</a></p><h3>Pages in the CMSMS Admin Panel</h3><p>You add pages, as well as other content (see next chapter), in the CMSMS Admin Panel from the Content &raquo; Pages menu.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Content / How CMSMS Works / Left simple navigation + 1 column
// Pages and navigation / How CMSMS Works / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Content');
$contentobj->SetAlias();
$contentobj->SetMenuText('Content');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['How CMSMS Works']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>The content is the information for the page. We have already mentioned that for each page on your site you  choose what template to use. When you add content to a page, it is automatically  placed in the placeholders of the template selected for that page.</p><p>A template can define one or several content areas, or content blocks. To add more content blocks to your template, use <code>{ldelim}content block=\'block name\'}</code>. These blocks will then appear as text areas when you edit or add a page that uses that template.</p><p>You can make a content block use only one line, instead of a full text area, by using the parameter oneline=true. That is, the full tag being: <code>{ldelim}content block=\'block name\' oneline=true}</code>. Read about more parameters in the help for the Content tag in the CMSMS Admin Panel, under Extensions &raquo; Tags.</p><h3>Content Types</h3><p>There are currently 6 main content types in version {cms_version} "{cms_versionname}". These content types determine the type of content for each menu item.</p><ul><li>Content</li><li>Error Page</li><li>External Page Link</li><li>Internal Page Link</li><li>Section Header</li><li>Separator</li></ul><p>The <strong>Content</strong> type is simply a regular page. Normally this is the only one you will use. That is what this page you are reading is. Here you can put any content that you would put on a regular page. The layout of these types of pages are controlled by the templates. For each <strong>content</strong> page you create you must add the title, menu text, choose if it is going to have a parent and choose a template for it.  If you login as admin and change the template of this page, you will see exactly how it works.</p><p>The <strong>Error Page</strong> type is just what it sounds like, a page you set for "404 page not found" errors, where you can add the content that shows when a 404 error occurs, a target type and title, you can also choose the template it uses, it has no parent as it is not part of the menu.</p><p>The <strong>External Page Link</strong> type is just what it sounds like, a link to another external page and you add the title, menu text, choose if it is going to have a parent and a destination page along with the target setting and other options that a content type page has. This <strong>external page link</strong> type also shows up in the menu following the same hierarchy rules as the <strong>content</strong> type.</p><p>The <strong>Internal Page Link</strong> type is also just what it sounds like, a link to another internal page. This <strong>internal page link</strong> type also shows up in the menu following the same hierarchy rules as the <strong>content</strong> type and you add the title, menu text, choose if it is going to have a parent and a destination page along with the target setting and other options that a content type page has.</p><p>The <strong>Section Header</strong> type is used to break up menus into groupings (sections). This is unrelated to the hierarchy, as the section headers have no associated pages with them but can be used to group a set of links of similar content under them. They are just a little bit of text to say what the next few links are in reference to.</p><p>The <strong>Separator</strong> type is just what it sounds like, a separator that appears on the menus. This type follows the hierarchy set in content management pages.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Menu Manager / How CMSMS Works / Left simple navigation + 1 column17
$contentobj = new Content;
$contentobj->SetName('Menu Manager');
$contentobj->SetAlias();
$contentobj->SetMenuText('Menu Manager');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['How CMSMS Works']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>The Menu Manager is a module that reads your page hierarchy and builds a navigation using a \'Menu Manager Template\'. By default a few sample menu manager templates are included with your default installation. For most users these are enough, as a menu basically is just an unordered list that is styled with CSS.</p><p>The Menu Manager module also accepts various optional attributes (parameters) in the {ldelim}menu{rdelim} tag to allow you to customize its behavior. You can see the list and explanation of these parameters in the Menu Manager Help which can be found on the right side of the screen when you click on "Layout &raquo; Menu Manager" in the administration console.</p><p>Customizing templates in the Menu Manager is as simple as clicking the \'Import Template to Database\' button, which will then allow you to create a template with a new name, and modify the layout of the template. You can use your new navigation template by specifying the new name in the call to {ldelim}menu{rdelim} in your page template. i.e: {ldelim}menu template=\'mynewtemplate\'{rdelim}.</p><h3>Menu Manager in the CMSMS Admin Panel</h3><p>Read more about how to do this in the <strong>Help</strong> for the Menu Manager in the CMSMS Admin Panel. It can be found in the Layout menu.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Extensions / How CMSMS Works / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Extensions');
$contentobj->SetAlias();
$contentobj->SetMenuText('Extensions');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['How CMSMS Works']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>There are three kinds of extensions, that can add many kinds of functionality to your default CMS Made Simple install. They are called tags, user defined tags, and modules.</p><h3>Tags</h3><p>Tags are the simplest form of extensions. They are designed to accomplish just one small and specific task.</p><p>There are a number of custom tags available with CMS Made Simple. To find what kind of tags are available look in Extensions &raquo; Tags in the Admin Panel.</p><p>To insert any of these in a template or a page, simply type e.g. <code>{ldelim}content}</code>. Many of these Smarty tags are used as placeholders in a template, i.e. placeholders for content, navigation, breadcrumbs etc.</p><p>Website developers who have a bit of PHP experience will find it easy to create and share their own custom tags.</p><h3>User defined tags</h3><p>Users can also create their own tags to insert in templates or pages., these are called user defined tags. They are snippets of php code (but without the &lt;?php and ?&gt; surrounding them), providing the ability to add re-usable pieces of php functionality to your site. User defined tags are inserted in templates and pages just like tags: <code>{ldelim}tagname}</code>.</p><p>Typically, user defined tags provide a utility that is special to a website, and likely won\'t need to be re-used on another site. Also they are typically small and used for simple tasks.</p><h3>Modules</h3><p>Modules are the highest level of plugin in the CMS Made Simple environment. They are designed to allow developers to implement complex tasks within CMSMS. A module typically provides advanced functionality, usually interacts with the database in complex ways, and may provide numerous reports or forms on the website. Additionally, a module may have an administrative interface to allow manipulating its data and its settings.</p><p>An extremely well defined API <em>(Application Programming Interface)</em> has been written to allow module developers to write complex, intricate, and fully functioning applications for use within a CMSMS powered website.</p><p>There are {cms_selflink page=\'modules\' text=\'a few modules included\'} with the default installation of CMS Made Simple. Other popular modules are Frontend Users, Album, Calendar, Guestbook and Form Builder.</p><p>The ModuleManager module (included with CMS Made Simple) allows browsing a list of available modules, reading about them, and then installing them on your website.</p><p>To insert modules in a template or a page, you actually use the module name as a parameter to the <code>{ldelim}cms_module}</code> tag. It looks like this: <code>{ldelim}cms_module module=\'modulename\' parameter1=\'this\' parameter2=5 parameter3=\'that\'}</code>. It is normal for modules to accept parameters to effect changes to their default behavior, though it is not always required.</p><h3>Read more</h3><p>You can read more about extensions in the <a class="external" href="http://docs.cmsmadesimple.org/modules/add-ons">CMSMS documentation</a>.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Event Manager / How CMSMS Works / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Event Manager');
$contentobj->SetAlias();
$contentobj->SetMenuText('Event Manager');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['How CMSMS Works']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>Events are a new powerful way of assigning actions to events. For example if you would like to send an email to the site administrator when a new file is uploaded or a new page is created by another user you could add some code to those events to be executed when that event happens.</p><p>In brief here\'s how it works:</p><p>a) A module, or the core, can register, and then Send Events such as "newNews", or "newFronteEndUser" or "fileUploaded", "editPage", etc, etc, etc. there\'s some 50 events in the core at the moment, and then uploads and frontend users have been configured to send events, We still have to do selfreg, etc, etc, etc.</p><p>b) There are pages in the admin to allow you to specify which modules, and/or user tags should handle those events, and the order that each of those handlers should be called in.</p><p>c) If one of the handlers of an event is a module, then.... the modules DoEvent method is called with the name of the event, and whatever data it wants to send. Each triggered event needs to be documented, but as of this moment, most are.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Workflow / How CMSMS Works / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Workflow');
$contentobj->SetAlias();
$contentobj->SetMenuText('Workflow');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['How CMSMS Works']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>These are the basic steps when creating a website with CMS Made Simple:</p><ol><li><em>Plan</em> -- Determine what pages you want (structure) and how you want  these pages to look (design). </li><li><em>Create Templates</em> -- Create one or several template(s) that  determine the layout of your pages. </li><li><em>Style the Templates</em> -- Attach one or more stylesheets to each  template and style the layout and content with CSS. </li><li><em>Create Pages</em> -- Then you create pages, add content to them and  select what template to use for each page. </li></ol><p>When a user navigates to your site the page is created from the template,  adding the content where the placeholder(s) are in the template.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Where do I get Help / How CMSMS Works / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Where do I get help?');
$contentobj->SetAlias();
$contentobj->SetMenuText('Where do i get help?');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['How CMSMS Works']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>The CMS Made Simple community is always at your service if you need some help with your site. Here is where you find more information and support:</p><ul><li><a class="external" href="http://docs.cmsmadesimple.org/">The CMSMS Documentation Website</a> -- Start here, the documentation is maintained by the CMSMS Dev-team</li><li><a class="external" href="http://forum.cmsmadesimple.org/">The CMSMS Forums</a> -- here you can search for answers to your questions or ask just about anything.</li><li><a class="external" href="http://cmsmadesimple.org/main/support/IRC">IRC</a> -- IRC is short for Internet Relay Chat and is like a community chat. Many developers hang out here and others that are ready to discuss and give support.</li></ul><p>Please remember that people involved in developing and supporting CMSMS have day jobs and other duties and might not be available 24/7. Be patient and polite and you will get better answers.</p><p>Hope you will enjoy using CMS Made Simple for creating your web sites! If you want to contribute to the development yourself, you are very welcome to do so. You can contact us on <a class="external" href="http://cmsmadesimple.org/main/support/IRC">IRC</a> or hit the <a class="external" href="http://forum.cmsmadesimple.org/">forums</a> to get involved.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

///////////////////////////////////////////
//  //  DEFAULT TEMPLATES EXPLAINED  //  //
///////////////////////////////////////////

// Default Templates Explained / -1 / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Default Templates Explained');
$contentobj->SetAlias();
$contentobj->SetMenuText('Default Templates Explained');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetAlias('default_templates');
$contentobj->SetParentId(-1);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
			      '<p>CMS Made Simple {cms_version} was installed with numerous default templates (you choose this during the installation process). These are to display some of the features of CMS Made Simple and to give you a head start when creating your own web sites.</p><p>The tags that are unique to templates in CMS Made Simple are described on the page {cms_selflink page=\'cmsms_tags\' text=\'CMSMS tags in the templates\'} (see menu to the left). Click on any link beneath that page in the menu to the left to see what the default templates look like.</p><h4>Changing the style of Default Templates</h4><p>All of the templates and style sheets have comments throughout them to help you find where to change the look of them.</p><h3>Menus/navigation</h3><p>Two kinds of navigation are used in these templates. For each there is a menu template in the Menu Manager. <strong>CSSMenu </strong>is a dropdown menu using only CSS. Well, for Internet Explorer 6 some JavaScript has to be used... Two of the page templates are using CSSMenu for navigation, {cms_selflink page=\'cssmenu_horizontal\' text=\'one with the menu horizontally at the top\'} and the other {cms_selflink page=\'cssmenu_vertical\' text=\'with the menu vertically to the left\'}.</p><p>The other navigation type is what we call <strong>Simple Navigation</strong>. That is just an unordered list that gets its style and appearance from the style sheets (CSS). Also here {cms_selflink page=\'top_left\' text=\'one page template is using a horizontal simple navigation\'} and the other {cms_selflink page=\'navleft\' text=\'a vertical menu\'}.</p><p>The menu tag in each template is used like this: <code>{ldelim}menu template=\'cssmenu\'}</code>, where the <code>cssmenu</code> is the name of the Menu Manager template, if you make a custom menu template you don\'t need to use the  on the end. More parameters can be used, for example to start a menu from the second level, collapse the children pages until the parent is clicked etc. Read more about that in the Menu Manager Help in the Admin Panel.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// CMSMS tags in the templates / Default Templates Exlplained / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('CMSMS tags in the templates');
$contentobj->SetAlias();
$contentobj->SetMenuText('CMSMS tags in the templates');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetAlias('cms_tags');
$contentobj->SetParentId($content_list['Default Templates Explained']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>Here we explain the tags that are used in the default templates that are specific to templates in CMS Made Simple. The rest of the templates are just pure HTML. You can read more about that in the <a class="external" href="http://docs.cmsmadesimple.org/layout/create-your-own-template">documentation website</a>.</p><div class="templatecode"><h3>Page title</h3><pre>&lt;title&gt;{ldelim}sitename} - {ldelim}title}&lt;/title&gt;</pre><p>For each page using these tags in a template the tags are replaced with the site name you specify in Site Admin &raquo; Global settings and the title you specify when you add/edit each page.</p><p><em>Read more</em> about the <code>{ldelim}sitename}</code> and <code>{ldelim}title}</code> tags in Extensions &raquo; Tags in the Admin Panel.</p></div><div class="templatecode"><h3>Metadata</h3><pre>{ldelim}metadata}</pre><p>This tag adds to your page any metadata that you have specified in Site Admin &raquo; Global settings and also page specific metadata that you can add under the Options tab when adding/editing a page.</p><p>It is also used for knowing the base folder for your site when using pretty URLs. So don\'t remove this if you use Pretty URLs!</p><p><em>Read more</em> about the <code>{ldelim}metadata}</code>tag in Extensions &raquo; Tags in the Admin Panel.</p></div><div class="templatecode"><h3>Stylesheets (deprecated)</h3><pre>{ldelim}stylesheet}</pre><p>This tag links to all style sheets (CSS) that you have attached to a template. It means that you only have to add this tag once and all attached style sheets will be linked automatically.</p><p><em>Read more</em> about the <code>{ldelim}stylesheet}</code> tag in Extensions &raquo; Tags in the Admin Panel.</p></div><div class="templatecode"><h3>Stylesheets</h3><pre>{ldelim}cms_stylesheet}</pre><p>This tag is the newer version of the tag above. The tag links to all style sheets (CSS) that you have attached to a template. It means that you only have to add this tag once and all attached style sheets will be linked automatically.</p><p>The new tag allows you to use smarty variables like [[$red]] to indicate a color, and one change will change it througout your layout. The new tag requires that [[root_url]]/ be put in front of images, as the stylesheets are cached.</p><p><em>Read more</em> about the <code>{ldelim}cms_stylesheet}</code> tag in Extensions &raquo; Tags in the Admin Panel.</p></div><div class="templatecode"><h3>Relational links</h3><pre>{ldelim}cms_selflink dir="start" rellink=1}{ldelim}cms_selflink dir="prev" rellink=1}{ldelim}cms_selflink dir="next" rellink=1}</pre><p>These are relational links for interconnections between pages, which is good for accessibility and Search Engine Optmization</p><p><em>Read more</em> about the <code>{ldelim}cms_selflink}</code> tag in Extensions &raquo; Tags in the Admin Panel.</p></div><div class="templatecode"><h3>Page width in Internet Explorer 6</h3><pre>{ldelim}literal}&lt;script type="text/JavaScript"&gt;&lt;!--//pass min and max -measured against window widthfunction P7_MinMaxW(a,b){ldelim}	var nw="auto",w=document.documentElement.clientWidth;	if(w&gt;=b){ldelim}nw=b+"px";}if(w&lt;=a){ldelim}nw=a+"px";}return nw;}//--&gt;&lt;/script&gt;&lt;!--[if lte IE 6]&gt;&lt;style type="text/css"&gt;#pagewrapper {ldelim}width:expression(P7_MinMaxW(720,950));}#container {ldelim}height: 1%;}&lt;/style&gt;&lt;![endif]--&gt;{ldelim}/literal}</pre><p>This isn\'t a tag really, but displays how to insert JavaScript in a CMSMS template.</p><p>The default templates use fluid page width. But Internet Explorer 6 doesn\'t understand min-width and max-width, so for that browser the min and max page width is set with this JavaScript. For other browsers the page width is set in the style sheets beginning with "Layout ..."</p></div><div class="templatecode"><h3>Skip links for accessibility</h3><pre>{ldelim}anchor anchor=\'main\' title=\'Skip to content\' accesskey=\'s\' text=\'Skip to content\'}</pre><p>Anchor links (links to an anchor in the same page) are inserted with the <code>{ldelim}anchor}</code> tag. In the default templates this is used for skip links that are visible to screen readers, but hidden with CSS to visual browsers.</p><p><em>Read more</em> about the <code>{ldelim}anchor}</code> tag in Extensions &raquo; Tags in the Admin Panel.</p></div><div class="templatecode"><h3>Header with logo image that links to default page</h3><pre>{ldelim}cms_selflink dir="start" text="$sitename"}</pre><p>In the header the &lt;h1&gt; tag (hidden by CSS) is a link to the page that is selected as the default page. The <code>dir="start"</code> parameter in the {ldelim}cms_selflink} tag is used for this. To get the site name as the text for the link, the <code>$sitename</code> variable is used.</p><p><em>Read more</em> about the <code>{ldelim}cms_selflink}</code> tag in Extensions &raquo; Tags in the Admin Panel.</p></div><div class="templatecode"><h3>Search</h3><pre>{ldelim}search}</pre><p>To insert a search form on your site, simply use the {ldelim}search} tag. Search is actually a module and should therefore be called as a parameter in the {ldelim}cms_module} tag, like this: <code>{ldelim}cms_module module=\'search\'}</code>. But to simplify matters, we did a wrapper tag so that it\'s easier to remember.</p><p><em>Read more</em> about the Search module in Extensions &raquo; Modules in the Admin Panel.</p></div><div class="templatecode"><h3>Breadcrumbs</h3><pre>{ldelim}breadcrumbs starttext=\'You are here\' root=\'Home\' delimiter=\'&raquo;\'}</pre><p>Breadcrumbs is a path to the current page. In the default templates we have chosen to put the text \'You are here\' before the path and force \'Home\' to always be the root in the path, even if it isn\'t. With the delimiter parameter you can select the delimiter that separates entries in the path.</p><p><em>Read more</em> about the <code>{ldelim}breadcrumbs}</code> tag in Extensions &raquo; Tags in the Admin Panel.</p></div><div class="templatecode"><h3>Navigation</h3><pre>{ldelim}menu template=\'simple navigation\' collapse=\'1\'}</pre><p>This is how you insert a menu where you want it to appear. Like the <code>{ldelim}search}</code> tag, this is actually just a wrapper tag, as the Menu Manager is a module.</p><p>In the default templates the menu manager template that is used for the menus are stored in files. That\'s why you see the .tpl extension in the template parameter. But you can easily import menu templates to the database and edit them directly in the Admin Panel. Then you simply omit the .tpl extension in the template parameter.</p><p><em>Read more</em> about the Menu Manager module in Extensions &raquo; Modules in the Admin Panel.</p></div><div class="templatecode"><h3>News</h3><pre>{ldelim}news number=\'3\' detailpage=\'news\'}</pre><p>This tag will display the last three news articles. When clicking a news article to read the details, it is opened on the page with the page alias \'news\'. That\'s what the detailpage parameter is doing.</p><p>Like all core modules there is a wrapper tag for the News module, to make it easier to use.</p><p><em>Read more</em> about the News module tag in Extensions &raquo; News in the Admin Panel.</p></div><div class="templatecode"><h3>Print button</h3><pre>{ldelim}print showbutton=true script=true}</pre><p>The <code>{ldelim}print}</code> tag is used to insert a print link. With the showbutton parameter set to true we have told the tag to output a button instead of text. The script parameter set to true means the print dialog window opens when clicking the button, for immediate printing.</p><p>The <code>{ldelim}print}</code> tag prints everything that is in your <code>{ldelim}content}</code> tag, that is only the content for a page.</p><p><em>Read more</em> about the <code>{ldelim}print}</code> tag in Extensions &raquo; Tags in the Admin Panel.</p></div><div class="templatecode"><h3>Page content</h3><pre>&lt;h2&gt;{ldelim}title}&lt;/h2&gt;{ldelim}content}</pre><p>Maybe the most important tag in your template. Where you put the <code>{ldelim}content}</code> is where the content for your page will appear.</p><p>We have also chosen to put the page title on every page (the <code>{ldelim}title}</code> tag), so that you don\'t have to put that in the content for every page.</p><p>The default <code>{ldelim}content}</code> tag is <strong>required</strong> for all templates.</p><p><em>Read more</em> about the <code>{ldelim}content}</code> and <code>{ldelim}title}</code> tags in Extensions &raquo; Tags in the Admin Panel.</p></div><div class="templatecode"><h3>Previous/next links</h3><pre>{ldelim}anchor anchor=\'main\' text=\'^ Top\'}{ldelim}cms_selflink dir="previous"}{ldelim}cms_selflink dir="next"}</pre><p>Some more internal links. These are using the dir parameter to link to the previous and next pages in the page hierarchy (separators and section headers will be omitted as they are no pages).</p></div><div class="templatecode"><h3>Page footer</h3><pre>{ldelim}global_content name=\'footer\'}</pre><p>Instead of bloating your template with lots of code you can put some code in a Global Content Block. Then call that Global Content Block with the <code>{ldelim}global_content}</code> tag. It\'s also useful for content or HTML code that is reused on several pages or templates.</p><p>In the default templates we have put the footer text in a Global Content Block with the name \'footer\'. You find the Global Content Blocks in the Content menu in the Admin Panel.</p><p><em>Read more</em> about the <code>{ldelim}global_content}</code> tag in Extensions &raquo; Tags in the Admin Panel.</p></div>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Left simple navigation + 1 column / Default Templates Explained / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Left simple navigation + 1 column');
$contentobj->SetAlias();
$contentobj->SetMenuText('Left simple navigation + 1 column');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetAlias('navleft');
$contentobj->SetParentId($content_list['Default Templates Explained']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>This template has the menu in left sidebar. The menu is using the <strong>Simple Navigation</strong> menu template. It is styled in the stylesheet called <strong>Navigation Simple - Vertical</strong>.</p><p>You can easily float the sidebar with the menu to the right instead. Look in the <strong>Layout Left sidebar + 1 column</strong> style sheet for the <code>float:left;</code> property in the <code>div#sidebar</code> element. Change that to <code>float:right;</code> and the sidebar with the menu will instead be on the right side of the content, of course you will also have to adjust the margins for the sidebar and the div#main, basically just swap the left and right margins.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Top simple navigation + left subnavigation + 1 column / Default Templates Explained / Top simple navigation + left subnavigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Top simple navigation + left subnavigation + 1 column');
$contentobj->SetAlias();
$contentobj->SetMenuText('Top simple navigation + left subnavigation + 1 column');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$topsimple_leftsubnav_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Top simple navigation + left subnavigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetAlias('top_left');
$contentobj->SetParentId($content_list['Default Templates Explained']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>With the Menu Manager you can easily split the navigation in two parts. On this page the top level in the page hierarchy is displayed horizontally and depending on what page is displayed a localized sub-menu is displayed vertically to the left. In this case the sub-menu to the left displays the sub-levels (children) to <strong>Default Templates Explained</strong>.</p><h3>The {ldelim}menu} tag</h3><p>The <code>{ldelim}menu}</code> tag is inserted twice in the page template. First where the main navigation is, which should only show the top level. It looks like this: <code>{ldelim}menu template=\'Simple Navigation\' number_of_levels=\'1\'}</code>.</p><p>The sub navigation should only contain the second level and down, depending on what is selected on the first level. Also, the third level links should only display when its parent on the second level is clicked, otherwise they are hidden. That is, the second level is collapsed unless the current page has sub pages.</p><p>The tag for the sub navigation looks like this: <code>{ldelim}menu template=\'simple_navigation.tpl\' start_level=\'2\' collapse=\'1\'}</code>.</p><h3>Attached style sheets for the menu</h3><p>As the main navigation and the sub navigation need to be styled differently (one horizontal, the other vertical), two navigation style sheets are attached to this page template. <strong>Navigation Simple - Horizontal</strong> is for styling the horizontal main menu. <strong>Navigation Simple - Vertical</strong> on the other hand, contains the style for the sub navigation to the left.</p><h3>Both using the same Menu Manager template</h3><p>However, as you could see, both parts of the navigation are using the same menu manager template. That is because the output code is the same. It is only through CSS that the two parts get styled differently.</p><h3>Floating the sidebar to the right</h3><p>You can easily float the sidebar with the sub navigation to the right instead. Look in the <strong>Layout Top menu + 2 columns</strong> style sheet for the <code>float:left;</code> property in the <code>div#sidebar</code> element. Change that to <code>float:right;</code> and the sidebar with the menu will instead be on the right side of the content, of course you will also have to adjust the margins for the sidebar and the div#main, basically just swap the left and right margins.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// CSSMenu top + 2 columns / Default Templates Explained / CSSMenu top + 2 columns
$contentobj = new Content;
$contentobj->SetName('CSSMenu top + 2 columns');
$contentobj->SetAlias();
$contentobj->SetMenuText('CSSMenu top + 2 columns');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$css_menutop_2col_theme->get_id());
$contentobj->SetTemplateId($template_list['CSSMenu top + 2 columns']);
$contentobj->SetOwner(1);
$contentobj->SetAlias('cssmenu_horizontal');
$contentobj->SetParentId($content_list['Default Templates Explained']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>This is a drop-down menu that is using only CSS (although some Javascript is required for Internet Explorer 6, note: IE6 will not let you use 2 of these menu types in a template at the same time as the second one will fail to open). It can be either vertical or horizontal.</p><p>The code we have inserted in the template that this page is using is simply <code>{ldelim}menu template=\'cssmenu.tpl\'}</code>.  You style the menu in the stylesheet <strong>Navigation CSSMenu - Horizontal</strong> or <strong>Navigation CSSMenu - Vertical</strong> for the vertical CSSMenu.</p><p>But to be on the safe side, copy this style sheet and attach your new style sheet to the template instead (and make your changes in your new style sheet). Then you can always revert to the default style sheet if something goes wrong.</p>');
$contentobj->SetPropertyValue('Sidebar',
	'<p>Just some test content goes here as an example of a very long sentence that probably should have been divided into several smaller sentences, were it not for this just being a test sentence on one of the default pages of CMS Made Simple, an excellent Content Management System for easily creating web sites, this sentence is added when adding/editing a page in the Sidebar: text area, this comes from the template place holder {ldelim}content block=\'Sidebar\'}.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// CSSMenu left + 1 column / Default Templates Explained / CSSMenu left + 1 column
$contentobj = new Content;
$contentobj->SetName('CSSMenu left + 1 column');
$contentobj->SetAlias();
$contentobj->SetMenuText('CSSMenu left + 1 column');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$css_menuleft_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['CSSMenu left + 1 column']);
$contentobj->SetAlias('cssmenu_vertical');
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Default Templates Explained']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>This is basically the same as the last one, CSSMenu top + 2 column, with the menu on the left instead of across the top there isn\'t a whole lot to say about it.</p><h3>Filler Text</h3><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Ut ac leo in lorem ultricies sollicitudin. Vivamus molestie elit nec nulla. Suspendisse potenti. Suspendisse at lorem. Donec pulvinar, magna eget molestie pretium, justo sem iaculis urna, eget condimentum nibh augue pellentesque arcu. Integer tristique tempor mauris. Sed justo orci, commodo volutpat, sagittis vitae, varius vitae, massa. Maecenas pede ligula, iaculis sit amet, pharetra eu, adipiscing consectetuer, eros. Duis ullamcorper nisl ac magna. Nunc neque dolor, posuere dapibus, convallis non, tristique sed, nibh. Suspendisse quis leo. Phasellus pretium erat ut purus. Duis facilisis consectetuer sapien. Nulla eget pede ut nisl faucibus consequat. Quisque erat lectus, luctus in, pellentesque ac, adipiscing eu, enim. Donec ultrices laoreet urna.</p><h3>Subheading</h3><p>Vestibulum vitae tellus. Fusce quis ligula. Cras mi. Mauris congue, lacus eget rhoncus venenatis, mi nunc volutpat nisl, ut ornare erat augue quis mauris. Nulla in sem. Donec semper odio ac ante. Cras a libero in risus mattis commodo. Phasellus pellentesque lectus. Donec a mi. Integer euismod neque at arcu. Morbi ligula nulla, dapibus nec, fermentum ut, tristique vel, pede. Morbi at diam. Vestibulum quam. Cras consectetuer wisi id neque. Etiam dictum vulputate ligula. Aliquam erat volutpat. Proin vitae lorem in justo imperdiet nonummy. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse leo. Sed in eros ut lectus lacinia condimentum.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Minimal template / Default Templates Explained / Minimal template
$contentobj = new Content;
$contentobj->SetName('Minimal template');
$contentobj->SetAlias();
$contentobj->SetMenuText('Minimal template');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$minimal_theme->get_id());
$contentobj->SetTemplateId($template_list['Minimal']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Default Templates Explained']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>This is an example of the very minimal that needs to be in a CMSMS template. No stylesheet is attached to the template, which is why it doesn\'t look very nice...</p><p>However, to make it slightly more appealing, some inline styling was used, for floating the content to the right of the menu.</p><p>The menu in this page template is using the <strong>Minimal Navigation</strong> template for Menu Manager. No accessibility stuff is in there, so it\'s recommended that the <strong>Simple Navigation</strong> menu template is rather used.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Higher End / Default Templates Explained / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Higher End');
$contentobj->SetAlias();
$contentobj->SetMenuText('Higher End');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Default Templates Explained']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>These are more complex then some of the other templates, especially the menus, they all 3 use the same menu template. Which shows you the power of CSS.</p><p>Be forewarned, if you use IE6 you won\'t see the best effects in any of the shadow menus that you see using a more standards compliant browser. I mean it\'s still nice grant you but... just upgrade your browser if you can.</p><h3>The Differences</h3><p>Starting with NCleanBlue you get a really nice, subtle Tabbed menu, then it goes on to have a real nice drop down effect.</p><p>You get a real nice 2.0 header and footer, great color scheme and the search is way cool, it\'s just a great theme, what can I say, thanks Nuno.</p><p>Then the next 2 submenus have another version of the shadowed drop, the first step will point up for the top sub menu and to the right for the left sub menus.</p><p>These 2 are the same layout as CSSMenu top + 2 columns and CSSMenu left + 1 column,  respectively, except for the menu template and some CSS.</p><p>We hope you enjoy these, for any changes you want to make it\'s always best to copy the original style sheet for safe keeping, you never know when you may need it.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// NCleanBlue / Higher End / NCleanBlue
$contentobj = new Content;
$contentobj->SetName('NCleanBlue');
$contentobj->SetAlias();
$contentobj->SetMenuText('NCleanBlue');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$ncleanblue_theme->get_id());
$contentobj->SetTemplateId($template_list['NCleanBlue']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Higher End']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
      '<p>Nuno has graciously supplied us with another of his great looking designs.</p><p>This one is using a new menu template so we can style the drop down for the children pages, using an image for the second ul going from the top down, it has an extra li at the bottom of the child pages ul &lt;li class="separator once" style="list-style-type: none;"&gt;&amp;nbsp; &lt;/li&gt; this is used to hold the bottom image.</p><h3>Filler Text</h3><p>Maecenas tristique, tortor nec eleifend luctus, nibh leo imperdiet wisi, et accumsan est lectus in orci. Proin facilisis, odio auctor feugiat accumsan, sapien purus iaculis dui, a volutpat augue pede ut sem. Nulla facilisi. Aliquam suscipit elementum ipsum. Morbi urna. Nam eros justo, varius sit amet, euismod eu, dictum nec, neque. Nullam id mi eu odio tempor adipiscing. Quisque hendrerit euismod nunc. Ut erat nulla, pellentesque nec, luctus eu, dictum nec, augue. Aliquam tincidunt sodales arcu. Nam porta sagittis quam. Vivamus eget purus egestas velit congue consectetuer.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// ShadowMenu Tab + 2 columns / Higher End / ShadowMenu Tab + 2 columns
$contentobj = new Content;
$contentobj->SetName('ShadowMenu Tab + 2 columns');
$contentobj->SetAlias();
$contentobj->SetMenuText('ShadowMenu Tab + 2 columns');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$shadowmenu_tab_2col_theme->get_id());
$contentobj->SetTemplateId($template_list['ShadowMenu Tab + 2 columns']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Higher End']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>Using the same menu template as the previous theme. We changed the child ul CSS to use a different top image. This involves changing some of the margin and padding as the images are a different shape. Note the difference in the second level and third level ul images, one has an arrow up and the other has an arrow left.</p><h3>Filler Text</h3><p>Curabitur ornare velit molestie nulla. Fusce fermentum facilisis mi. Maecenas volutpat, eros ac pellentesque mollis, urna elit rutrum turpis, congue convallis nibh erat nec purus. Sed malesuada consectetuer turpis. Nulla sollicitudin placerat augue. Vestibulum ut sem eget turpis laoreet cursus. Vestibulum ante urna, mollis eget, cursus eget, viverra non, lectus. Aliquam erat volutpat. Aenean gravida tempor nulla. Sed sem lorem, pulvinar non, placerat non, vestibulum sed, tellus. Phasellus fermentum velit id dui. Praesent vulputate. Nam in dui.</p><p>Maecenas tristique, tortor nec eleifend luctus, nibh leo imperdiet wisi, et accumsan est lectus in orci. Proin facilisis, odio auctor feugiat accumsan, sapien purus iaculis dui, a volutpat augue pede ut sem. Nulla facilisi. Aliquam suscipit elementum ipsum. Morbi urna. Nam eros justo, varius sit amet, euismod eu, dictum nec, neque. Nullam id mi eu odio tempor adipiscing. Quisque hendrerit euismod nunc. Ut erat nulla, pellentesque nec, luctus eu, dictum nec, augue. Aliquam tincidunt sodales arcu. Nam porta sagittis quam. Vivamus eget purus egestas velit congue consectetuer.</p>');
$contentobj->SetPropertyValue('Sidebar',
	'<h4>Filler Text</h4><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cras sodales gravida est. Nullam enim ipsum, convallis quis, iaculis quis, facilisis eu, felis. Proin euismod hendrerit tortor. Aliquam erat volutpat. Morbi tempus diam sit amet neque. Sed sem metus, sagittis vel, lobortis ac, tempus sit amet, wisi. Phasellus in diam. Maecenas ultrices rutrum mauris. Vestibulum dolor justo, blandit a, posuere quis, varius at, tellus. Vestibulum convallis. Nulla ut leo sed elit eleifend varius. Aenean eget est id lorem posuere laoreet.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// ShadowMenu left + 1 column / Higher End / ShadowMenu left + 1 column
$contentobj = new Content;
$contentobj->SetName('ShadowMenu Left + 1 column');
$contentobj->SetAlias();
$contentobj->SetMenuText('ShadowMenu Left + 1 column');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$shadowmenu_left_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['ShadowMenu left + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Higher End']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
      '<p>Again using the same menu template as the two previous themes. We changed the child ul CSS to use a different top image. This involves changing some of the margin and padding as the images are a different shape. Note the second level and third level ul are now using the same image that has an arrow left.</p><h3>Filler Text</h3><p>Curabitur ornare velit molestie nulla. Fusce fermentum facilisis mi. Maecenas volutpat, eros ac pellentesque mollis, urna elit rutrum turpis, congue convallis nibh erat nec purus. Sed malesuada consectetuer turpis. Nulla sollicitudin placerat augue. Vestibulum ut sem eget turpis laoreet cursus. Vestibulum ante urna, mollis eget, cursus eget, viverra non, lectus. Aliquam erat volutpat. Aenean gravida tempor nulla. Sed sem lorem, pulvinar non, placerat non, vestibulum sed, tellus. Phasellus fermentum velit id dui. Praesent vulputate. Nam in dui.</p><p>Maecenas tristique, tortor nec eleifend luctus, nibh leo imperdiet wisi, et accumsan est lectus in orci. Proin facilisis, odio auctor feugiat accumsan, sapien purus iaculis dui, a volutpat augue pede ut sem. Nulla facilisi. Aliquam suscipit elementum ipsum. Morbi urna. Nam eros justo, varius sit amet, euismod eu, dictum nec, neque. Nullam id mi eu odio tempor adipiscing. Quisque hendrerit euismod nunc. Ut erat nulla, pellentesque nec, luctus eu, dictum nec, augue. Aliquam tincidunt sodales arcu. Nam porta sagittis quam. Vivamus eget purus egestas velit congue consectetuer.</p>');


// Welcome to Simplex / Default Templates Explained / Higher End / Simplex
$contentobj = new Content;
$contentobj->SetName('Welcome to Simplex');
$contentobj->SetAlias();
$contentobj->SetMenuText('Simplex Theme');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$simplex_theme->get_id());
$contentobj->SetTemplateId($template_list['Simplex']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Higher End']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
     '<p>Simplex Theme has been created to demonstrate HTML5 and CSS3 functionality within CMS Made Simple&trade;.<br />It is shipped with a CSS Framework making it possible for you to create Responsive and Mobile capabale layouts with ease.</p><h2>What is included?</h2><p>With this Template you will find four Stylesheets attached to it.</p><ul><li>Simplex Core</li><li>Simplex Layout</li><li>Simplex Mobile</li><li>Simplex Print</li></ul><p>Main Functionality of this Template is included in Core Stylesheet. It contains a simple Fluid Grid Framework based on <a class="external" href="http://960.gs/" title="960 Grid System" target="_blank">960 Grid System</a>.<br />In this same Stylesheet CSS <a class="external" href="http://www.w3.org/TR/css3-mediaqueries/" title="W3C Media Queries" target="_blank">Media Queries</a> are being used that make it possible for a flexible layout based on Screen width.<br /><br />With Simplex Theme it is very easy to quickly change appearance of complete Site at once. If you look at Page Template code you will find "boxed" id in the <code>&lt;body&gt;</code> tag.<br />When this id is removed the Layout of the Site is changed and you would face a simple layout with White background.<br />You can also quickly change allignement of the complete Site. If you change the class of "wrapper" div to leftaligned or rightaligned, whole Page will be aligned to left or right.</p><h2>Support for Mobile Devices</h2><p>As mentioned above this Theme is shipped with Stylesheet Framework that gives you a starting point for easy developement of Responsive Layout.<br />Mobile world is very versatile and Framework itself is by no means perfect, it is only a starting point but as a Developer you should decide which technique you should use for your current Project.<br />Responsive Template is only one small step towards Mobile support.</p><p>This Theme requires <a class="external" href="http://jquery.org/" title="jQuery" target="_blank">jQuery</a> which is included with <code>{ldelim}cms_jquery{rdelim}</code> tag.</p><p><cite>Note: {ldelim}cms_jquery{rdelim} tag is included at the bottom of the Template. You should be carefull with it when you are using Modules that include jQuery in &lt;head&gt; section.</cite></p><p>In file functions.js a section is included that makes it possible of Navigating through site with some Mobile Devices. This part of the code, covers only few devices and it is only meant as an example and a starting point for Developer.</p><h2>This and that</h2><p>As an example of <a class="external" href="http://www.smarty.net/" title="Smarty" target="_blank">Smarty</a> power within CMS Made Simple&trade; Templates a very simple Slider has been included, which demonstartes how easy it is to quickly create a Slideshow without a single Module.</p><pre><code>{ldelim}assign var=\'teaser\' value=\'uploads/simplex/teaser/*.jpg\'|glob{rdelim}<br />{ldelim}foreach from=$teaser item=\'one\'{rdelim}<br /> &lt;div&gt;&lt;img src=\'{ldelim}root_url{rdelim}/{ldelim}$one{rdelim}\' width=\'852\' height=\'275\' alt=\'\' /&gt;&lt;/div&gt;<br />{ldelim}/foreach{rdelim}<br /> {/strip}</code></pre><p><cite>If you would like to make this Slider responsive you should include a additional jQuery Plugin like for example <a class="external" href="http://swipejs.com" target="_blank" title="SwipeJS">SwipeJS</a></cite></p><p>In included Stylesheets, Smarty has been used as well. This should make it possible for you, to quickly change Color scheme of the theme by simply changing HEX code within assign Tags.</p><pre><code>[[assign var=\'boxed_bg\' value="#d1d1d1 url(`$path`/boxed-bg.gif)"]][[assign var=\'light_grey\' value=\'#f1f1f1\']]<br />[[assign var=\'grey\' value=\'#e9e9e9\']]<br />[[assign var=\'dark_grey\' value=\'#555\']]<br />[[assign var=\'white\' value=\'#fff\']]<br />[[assign var=\'orange\' value=\'#1e60ac\']]<br />[[assign var=\'dark_orange\' value=\'#1e60ac\']]<br />[[assign var=\'yellow\' value=\'#fdbd34\']]</code></pre><p>If you are using a modern Browser, you will notice that the Theme is using some of <a class="external" href="http://www.w3.org/TR/CSS/#css3" title="CSS3" target="_blank">CSS3</a> techniques. There are no Internet Explorer fallbacks included but this doesn\'t mean that it does not work in Internet Explorer.<br />A Visitor that is using Internet Explorer will simply see a Layout with gracefull fallback, meaning animations will not animate, rounded corners will be edges...</p><p><em>Note from Theme Develper Goran Ilic (uniqu3e):</em></p><blockquote><cite>The Simplex Theme was kept simplistic which should make it possible for a Developer to easily read code used in Theme and either create a new Layout from it or editing this Theme.<br /><br />A full Internet Explorer or Mobile support was intentionally not included, as each Developer should decide how far a old Browser like Internet Explorer (7,8) or which Mobile devices he wants to support and which Technique he will use.<br />Each Project is different and with each Project there is a need for different techniques.</cite></blockquote>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

//////////////////////////////////
//  //  DEFAULT EXTENSIONS  //  //
//////////////////////////////////

// Default Extensions / -1 / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Default Extensions');
$contentobj->SetAlias();
$contentobj->SetMenuText('Default Extensions');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId(-1);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>With the default installation of CMS Made Simple come six modules and a number of tags. The features of these are described and displayed on the following pages.</p><p>To find out more about the core modules, click {cms_selflink page=\'modules\' text=\'Modules\'}. For an explanation the core tags, simply click {cms_selflink page=\'tags\' text=\'Tags\'}.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Modules / 24 / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Modules');
$contentobj->SetAlias();
$contentobj->SetMenuText('Modules');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Default Extensions']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>There are six modules that come with the default installation of CMS Made Simple. On the following pages we explain how these are used. Click on each module name in the menu to the left or in the list below.</p><p>To insert a module in a template or a page you normally use the <code>{ldelim}cms_module}</code> tag with the module name as one of the parameters. But to simplify things, all core modules also have a tag wrapper, so that they are called simple by their name, like <code>{ldelim}news}</code>.</p><ul><li>{cms_selflink page=\'news\' text=\'News\'}</li><li>{cms_selflink page=\'menu-manager-2\' text=\'Menu Manager\'}</li><li>{cms_selflink page=\'theme-manager\' text=\'Theme Manager\'}</li><li>{cms_selflink page=\'microtiny\' text=\'MicroTiny\'}</li><li>{cms_selflink page=\'search\' text=\'Search\'}</li><li>{cms_selflink page=\'module-manager\' text=\'Module Manager\'}</li></ul>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// News / Modules / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('News');
$contentobj->SetAlias();
$contentobj->SetMenuText('News');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Modules']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>Most web sites have a section for the latest news. In CMS Made Simple the best way to accomplish that is by using the News module.</p><p>To display a list of news items you insert the tag <code>{ldelim}news number=\'5\' category=\'General\'}</code>. On this page the tag is inserted in the template. But it can also be inserted on a page. You can see the News module in use in the sidebar to the left.</p><p>There are a number of parameters that can be used in conjunction with this tag. To read about how a module is used, navigate to Extensions &raquo; Modules in the Admin Panel and click on "Help" for the module you want to read about.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Menu Manager / Modules / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Menu Manager');
$contentobj->SetAlias();
$contentobj->SetMenuText('Menu Manager');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Modules']);
$contentobj->SetAlias('menu-manager-2');
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>The Menu Manager has already been explained on the How CMSMS Works » {cms_selflink page=\'menu-manager\' text=\'Menu Manager\'} page. It is a very powerful module that can be used for any kind of navigation system on your web site.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Theme Manager / Modules / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Theme Manager');
$contentobj->SetAlias();
$contentobj->SetMenuText('Theme Manager');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Modules']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>The Theme Manager module allows you to import and export templates and their attached stylesheets, including any images they use, as "themes". This allows you to share your look and feel with other CMSMS users.</p><p>It is very easy to convert any kind of template to be used with CMS Made Simple. Many templates like this have already been converted and can be installed using the Theme Manager, the CMSMS community also shares themes for anyone to download and use at the <a class="external" target="_blank" href="http://themes.cmsmadesimple.org">CMSMS Themes site</a>.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// MicroTiny / Modules / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('MicroTiny');
$contentobj->SetAlias();
$contentobj->SetMenuText('MicroTiny');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Modules']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>MicroTiny is a so called WYSIWYG editor for editing pages. WYSIWYG stands for What You See Is What You Get. It works similar to a word processor, where you can select the style for the content and see how it is going to look on the page.</p><p>Among available WYSIWYG editors CMS Made Simple has decided to use MicroTiny (the stripped down version of TinyMCE). TinyMCE is among the most developed WYSIWYG editors, with regular updates, a large following and customizable features.</p><p>However, it is very difficult to create a cross-browser online editor that works in all different kinds of environments. If you are familiar with HTML you can select no WYSIWYG in My Preferences &raquo; User Preferences in the Admin Panel. That gives you more control over the code that will be on the page.</p><p>There are also other WYSIWYG editor modules available for download.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();


// Search / Modules / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Search');
$contentobj->SetAlias();
$contentobj->SetMenuText('Search');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Modules']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>Search is a module for searching "core" content along with certain registered modules. You put in a word or two and it gives you back matching, relevant results.</p><p>You can see the search module in use in the default templates, like on this page. Simply put <code>{ldelim}search}</code> in your template, where you want the search form to appear. If you want the results of a search to appear on a different page, you can specify this with the parameter <code>resultpage=\'page alias\'</code>.</p><p>For more information, see the Search module in the Admin Panel, in the Extensions menu.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();


// Module Manager / Modules / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Module Manager');
$contentobj->SetAlias();
$contentobj->SetMenuText('Module Manager');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Modules']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>A client for the ModuleRepository, this module allows you to see what modules are available, the version number, size, and Status/Action (whether it is already installed or not), read the Help and About for each module, letting you install modules from remote sites without the need for FTP\'ing, or unzipping archives. Module XML files are downloaded using SOAP, integrity verified, and then expanded automatically.</p><p>ModuleManager now checks dependencies. When dependencies are set, the module wont install until dependencies are met. Also a new tab is available, that shows newer versions of installed modules.</p><p>In short, this means that you can download and install modules directly from the Admin Panel. Any module that has been released as an XML file can be downloaded and installed. Go to Extensions &raquo; Module Manager in the Admin Panel to see the list of modules from the official CMSMS repository in the CMSMS Development Forge.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();


// Tags / Default Extensions / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Tags');
$contentobj->SetAlias();
$contentobj->SetMenuText('Tags');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Default Extensions']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>There are a number of custom tags included with the default CMS Made Simple installation. They are all described and demonstrated in the following page, and user defined tags are in the next one.</p><p>To use a tag, simply put it in the template or page like this: {ldelim}nameoftag}. Some tags can also take parameters, which are described in the Help that is accessible for each tag in Extensions &raquo; Tags in the Admin Panel.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// Tags in the core / Tags / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('Tags in the core');
$contentobj->SetAlias('cms_tags');
$contentobj->SetMenuText('Tags in the core');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Tags']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>There are plenty of tags included with the CMSMS core. Some of them are demonstrated here, for any questions as to the parameters they can take or anything else please see the Tags Help.</p><h3>{ldelim}anchor}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}anchor anchor=\'here\' text=\'Scroll Down\' class=\'myclass\' title=\'mytitle\' tabindex=\'1\' accesskey=\'s\'}</code></dd> <dt>Display</dt> <dd>Creates a link to an anchor on the same page. Used for example for the ^Top link at the bottom of this page.</dd> </dl><h3>{ldelim}cms_breadcrumbs{rdelim}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}cms_breadcrumbs root=\'Home\'{rdelim}</code></dd> <dt>Display</dt> <dd>Breadcrumbs are a navigational technique displaying all visited pages leading from the home page to the currently viewed page. You find it under the header on this page.</dd></dl><h3>{ldelim}cms_module}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}cms_module module=\'somemodulename\' param1=\'something\' param2=true}</code></dd> <dt>Display</dt> <dd>This tag is used to insert modules into your templates and pages.  Used for any module that you download. In the default templates, wrapper tags are used for inserting modules though. That is, a tag is made to insert a cms_module tag.</dd> </dl><h3>{ldelim}cms_selflink}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}cms_selflink page="1"}</code> or <code>{ldelim}cms_selflink page="alias"}</code></dd> <dt>Display</dt> <dd>Creates a link to another CMSMS content page inside your template or content. Can also be used for external links with the ext parameter. </dd> <dt>Example</dt> <dd>{cms_selflink page=\'modules\' text=\'Link to the modules page\'} </dd> <dd><a class="external" href="http://www.cmsmadesimple.org">This is an external link to the CMS Made Simple website</a></dd> </dl><h3>{ldelim}cms_version}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}cms_version}</code></dd> <dt>Display</dt> <dd>Displays current version number of CMS Made Simple. </dd> <dt>Example</dt> <dd>See the footer on this page.</dd> </dl><h3>{ldelim}cms_versionname}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}cms_versionname}</code></dd> <dt>Display</dt> <dd>Displays current version name of CMS Made Simple. </dd> <dt>Example</dt> <dd>See the footer on this page.</dd> </dl><h3>{ldelim}current_date}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}current_date format="%A %d-%b-%y %T %Z"}</code></dd> <dt>Display</dt> <dd>Prints the current date and time.</dd> <dt>Example</dt> <dd>{current_date format="%A %d-%b-%y %T %Z"}</dd> </dl><h3>{ldelim}embed}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}embed url="http://www.cmsmadesimple.org"}</code></dd> <dt>Display</dt> <dd>Enable inclusion (embeding) of any other application into the CMS. The most usual use could be a forum. </dd> </dl><h3>{ldelim}global_content}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}global_content name=\'footer\'}</code></dd> <dt>Display</dt> <dd>Inserts a Global Content Block (previously known as HTML blob) into your template or page. The code for the footer of this page is in a Global Content Block. </dd> </dl><h3>{ldelim}menu_text}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}menu_text}</code></dd> <dt>Display</dt> <dd>Prints the menu text of the page.</dd> <dt>Example</dt> <dd>{menu_text}</dd> </dl><h3>{ldelim}modified_date}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}modified_date format="%A %d-%b-%y %T %Z"}</code></dd> <dt>Display</dt> <dd>Prints the date and time the page was last modified. </dd> <dt>Example</dt> <dd>{modified_date format="%A %d-%b-%y %T %Z"}</dd> </dl><h3>{ldelim}print}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}CMSPrinting}</code></dd> <dt>Display</dt> <dd>Creates a link to only the content of the page.</dd> <dt>Example</dt> <dd>{ldelim}CMSPrinting}</dd> </dl><h3>{ldelim}site_mapper}</h3><dl> <dt>Syntax used</dt> <dd><code>{ldelim}site_mapper}</code></dd> <dt>Display</dt> <dd>Prints out a sitemap.</dd> <dt>Example</dt> <dd>{site_mapper}</dd> </dl>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

// User Defined Tags / Tags / Left simple navigation + 1 column
$contentobj = new Content;
$contentobj->SetName('User Defined Tags');
$contentobj->SetAlias();
$contentobj->SetMenuText('User Defined Tags');
$contentobj->SetPropertyValue('searchable',1);
$contentobj->SetPropertyValue('design_id',$leftsimple_1col_theme->get_id());
$contentobj->SetTemplateId($template_list['Left simple navigation + 1 column']);
$contentobj->SetOwner(1);
$contentobj->SetParentId($content_list['Tags']);
$contentobj->SetActive(TRUE);
$contentobj->SetShowInMenu(TRUE);
$contentobj->SetCachable(TRUE);
$contentobj->SetPropertyValue('content_en',
	'<p>One of the little known features of CMS Made Simple is the User Defined tag.  Basically, this allows you to write PHP code inside the Admin Panel.  Use the \'Add User Defined Tag\' button in Extension &raquo; User Defined Tags in the Admin Panel, write some code, and then insert into a template or page with {literal}{newpluginname}{/literal}.  Simple!</p><p>As an example, I\'ve put together a one line plugin/tag that will show your current User Agent information (which browser you\'re using).  The output is right here: <strong>{user_agent}</strong>.</p><p>If you\'re not looking at the source, all that is in the page is {literal}{user_agent}{/literal}.  To see how this code works, edit the user_agent tag in the Extensions &raquo; User Defined Tags page of the admin.</p><p>This is a VERY powerful feature if used right.  Remember, user defined tags do not get cached, therefore, scripts to rotate ad banners and such will work just fine. Note also that tag code has to be written <em>without</em> opening &lt; ? php  and ending  ? &gt; tags.</p>');
$contentobj->Save();
$content_list[$contentobj->Name()] = $contentobj->Id();

?>
