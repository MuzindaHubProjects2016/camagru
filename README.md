# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    README.md                                          :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: kmuvezwa <marvin@42.fr>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2017/10/17 13:47:08 by kmuvezwa          #+#    #+#              #
#    Updated: 2017/10/22 17:54:21 by kmuvezwa         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

Camagru

1 User features

• The application should allow a user to sign up by asking at least for an email, a
password with at least a minimum level of complexity. At the end of the sign-up
process a confirmation email should ve sent to the user in order to validate the
sign-up process.

• The user should then be able to connect using his username and his password. This
user also should be able to receive an email for resetting his password in case he
forgot it.

• The user should be able to disconnect in one click at any time on any page.

2. Editing features

This part should be accessible only to users that are authentified/connected and gently reject all other users that attempt to access it without being successfully logged in.

This page should contain 2 sections:
• A main section containing the preview of the user’s webcam, the list of superposable images and a button allowing to capture a picture.

• A side section displaying thumbnails of all previous pictures taken.

• Superposable images must be selectable and the button allowing to take the picture should be inactive (not clickable) as long as no superposable image has been selected.

• The creation of the final image (so among others the superposing of the two images) must be done on the server side, in PHP.

• Because not everyone has a webcam, you should allow the upload of a user image
instead of capturing one with the webcam.

• The user should be able to delete his edited images, but only his, not other users’ creations.

3 Gallery features

• This part is to be public and must display all the images edited by all the users, ordered by date of creation. It should also allow (only) a connected user to like
them and/or comment them.

• When an image receives a new comment, the author of the image should be notified
by email.

• The list of images must be presented in successive pages (i.e. X images by page).

References:

Login, Sessions and Encryption

https://github.com/TheGodOfAwesome/Passphrase

MVC

You will have to use the abstraction interface PDO1 to access your database and define the error mode2 on PDO::ERRMODE_EXCEPTION.

You can use the web server of your choice, either Apache, Nginx or even built-in web server3.

Your web application should be at list be compatible with Firefox (>= 41) and Chrome (>= 46).

Your website should have a decent page layout (meaning at least a header, a main section and a footer), able to display on mobile devices and have an adapted layout on small resolutions.

All your forms should have correct validations and the whole site should be secured.

This point is COMPULSORY and shall be verified when the project is evaluated.

To have an idea, here are some stuff that is NOT considered as SECURE:
• Store plain (unencrypted) passwords in the database.
• Offer the ability to inject HTML ou “user” JavaScript in badly protected variables.
• Offer the ability to upload undesired content on the server.
• Offer the possibility of altering an SQL query.

Capturing images:

https://trinitytuts.com/capture-and-save-image-with-html5-and-php/

http://www.vivekmoyal.in/webcam-in-php-how-to-use-webcam-in-php/

https://www.youtube.com/watch?v=NRXMcZaMlrA

https://www.youtube.com/watch?v=gA_HJMd7uvQ

PDO

http://php.net/manual/en/book.pdo.php

http://php.net/manual/en/pdo.error-handling.php

https://www.itechempires.com/2016/06/php-login-registration-system-with-php-data-object-pdo/

Merging Images

https://stackoverflow.com/questions/1481421/superimposing-images-in-php

https://stackoverflow.com/questions/6547784/superimpose-images-with-php

https://stackoverflow.com/questions/3876299/merging-two-images-with-php

http://www.walkswithme.net/how-to-superimposing-images-using-php

http://php.net/manual/en/imagick.compositeimage.php
