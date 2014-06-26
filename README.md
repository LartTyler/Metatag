# Metatag

A metadata tagging system for Wordpress. 

# Usage

In your page or post, simply add the metatag shortcode:

  [meta name="title" value="Metatag Demo!"]
  [meta name="author" value="Tyler Lartonoix"]
  
  Your post content as usual.
  
In order to gain access to the meta values in your template files (or anywhere else, for that matter) all you need to do is obtain the post content. Metatag hooks into Wordpress's do_shortcode handler to obtain the meta values when the content is parsed. So, an example template file might look like this:

```
  <?php
    $content = null;
    
    if (have_content() && the_post())
      $content = get_the_content();
    
    get_header();
  ?>
  
  <h1 class="title">
    <?= MetaTag->get('title', 'Untitled') ?>
    <small>Authored by <?= MetaTag->get('author', 'anonymous') ?></small>
  </h1>
  
  <div class="container">
    <?= $content ?>
  </div>
  
  <?php
    get_footer();
  ?>
```

Any values found by Metatag are obtained via the MetaTag#get method, which accepts a key as the first argument, and a default value as an optional second argument. If a default value is not provided, `null` is used.
