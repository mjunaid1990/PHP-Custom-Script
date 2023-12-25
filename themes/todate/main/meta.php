<meta charset="UTF-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
<meta http-equiv="content-language" content="en-us" />
<meta name="title" content="<?php echo (!empty($data['title'])) ? $data['title'] : $config->default_title;?>" />
<meta name="description" content="<?php echo (!empty($data['description'])) ? $data['description'] : $config->meta_description;?>" />
<meta name="keywords" content="<?php echo (!empty($data['keywords'])) ? $data['keywords'] : $config->meta_keywords;?>" />

<link rel="canonical" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />

<!--added by Community Devs LLC-->
<meta name='dmca-site-verification' content='eE5RZTVZWHdtN3hCNE1TVGk1RnB5a1J1anRXK0NrTTRSRmtCWkJtOWk1cz01' /> 


<meta property="og:title" content="<?php echo (!empty($data['title'])) ? $data['title'] : $config->default_title;?>" />
<meta property="og:description" content="<?php echo (!empty($data['description'])) ? $data['description'] : $config->meta_description;?>" />
<meta property="og:image" content="<?php echo (!empty($data['image'])) ? $data['image'] : $config->sitelogo;?>" />
<meta property="og:url" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
<meta property="og:type" content="article" />
<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,500&display=swap" rel="stylesheet" />