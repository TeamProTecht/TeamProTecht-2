Changes that were made to the user folder:
1. Removed index.html, style.css and connectdb.php from main
2. Changed browse.html to browse.php
3. Moved javascript.js into userside/JavaScript as script.js
4. All css files moved into userside/css
4.5. All css images moved into userside/css/images

Changes that were made in browse.php:
1. Search products feature works. It does call to the database (make sure to connect it correctly)
2. Changed filter price to minimum and maximum prices for ease (doesn't work as of now)
3. Redesigned the product results to flex boxes (Each showing brand, product name, price, image, and add to basket button)
3.5 Add to basket button needs updated insight from the login page and database basket table before fully implementing

Things to discuss:
1. All folders should be organised into css(and images), javascript, sql to avoid copying other styles by mistake
2. Updated discussion of the database basket table (how to collect each item for 1 basket for 1 user instead of several baskets)

Things still to do:
1. Add product images for product search previews
2. Make the filter feature work
3. Make the add to basket feature work
4. Tweak css a bit