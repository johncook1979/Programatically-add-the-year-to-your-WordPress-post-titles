# Programatically add the year to your WordPress post titles
Programmatically add the year to your WordPress post titles by using a shortcode in the title. This can offer a fantactic SEO boost with little effort involved in updating the post title on a yearly basis.
There are a couple of caveats to be aware of. 
1. When using the shortcode in the post title, the shortcode will appear in the slug. You will need to manually remove the shortcode from the slug or use the provided code at the end of the functions.php file *
2. If you are using Yoast SEO you will need to modify the code slightly (see code comments)

* The snippet at the end of the functions.php file will update the slug when you publish a post by removing the 'year' shortcode name from the title. The 'year' is removed and is not replaced. You can replace it with the current year, however, doing so will cause several problems in the future. For example, the slug will contain an outdated year, appearing to contain irrelevant information. You can programatically update the year in the slug, however, this will create other issues such as redirects, 404's and potential duplicate content problems. This is why it is recommended to just remove the year from the slug.
