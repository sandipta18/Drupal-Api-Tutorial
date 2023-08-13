// (function ($, Drupal) {
//   Drupal.behaviors.customApiIntegration = {
//     attach: function (context, settings) {
//       // Fetch data from the API
//       fetch('https://fakestoreapi.com/products')
//         .then(res => res.json())
//         .then(json => {
//           // Pass the data to the Twig template
//           console.log(json)
//           $('.products-list').each(function () {
//             $(this).html(renderProductsList(json));
//           });
//         })
//         .catch(err => console.error('Error fetching data:', err));
//     }
//   };

//   // Function to render the products list in Twig syntax
//   function renderProductsList(products) {
//     var output = '<ul>';
//     products.forEach(function (product) {
//       output += '<li>' + product.title + ' - '
//       + product.price +
//       product.description +
//       "<img src='product.image'></img>" + '</li>'
//       +product.category;
//     });
//     output += '</ul>';
//     return output;
//   }
// })(jQuery, Drupal);





