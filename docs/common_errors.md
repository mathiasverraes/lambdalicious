# Common Errors

**PHP Fatal error:  Maximum function nesting level of '100' reached, aborting!**

Functional Programming is all about recursion! Set or change `xdebug.max_nesting_level = 100` in your php.ini to a higher number.

**Use of undefined constant xyz - assumed 'xyz'**

- You didn't define the atom xyz. Define it using `atom('xyz')` before using it, or make a temporary atom using `@xyz`.
- Try setting `ini_set('scream.enabled', false);` in the code or in your php.ini

