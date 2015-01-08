Ecommerce Business Logic
==============
This is an example of how to create a domain model from an user histories.

For using this logical business with your frame you must implement this 2 port/interface.

	/src/ProductRepositoryInterface
	/src/CartRepositoryInterface

And inject it to the EcommerceManager

	$ecommerManager = new Ecommerce($productRepository, $cartRepository)
	

User histories
---

CUSTOMER I want to ask for a list of products so I can choose what I want to buy

CUSTOMER I want to be able to choose a product so that I can put it into my basket

CUSTOMER I want to be able to remove a product from my basket so that I can change my mind

CUSTOMER I want to be able to see the total cost of the products in my basket so that I can change my mind


CUSTOMER I want to be able to save my basket for another visit (restart of the program) so that I can think longer about my purchases
        
ADMINISTRATOR I want to add new products to my shop
	Details: Products have Name,ref,description and price
	
ADMINISTRATOR I want to update the products on my shop
	
ADMINISTRATOR I want to remove products on my shop	
