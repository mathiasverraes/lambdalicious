# Lambdalicious

Elegant Functional Programming in PHP

![Lambda Man by Martin Grabmüller](docs/lambda-man.jpg "Lambda Man by Martin Grabmüller")

## Design Goals

- Decorate, wrap, fork, copy/paste, borrow, steal shamelessly from smarter people than myself.
- Allow you to write beautiful, elegant, and expressive code, with a high signal-to-noise rate.
- Gloriously global! Polluting your global namespace? Think of it as cleaning up your global namespace!
- Higher order functions baby!

## Usage

```php

<?php
assert(
    §([1, 2, 3])                    // Wrap an array with the ampersand function §()
        ->map(operator('+', 2))     // Map the array to a callback
        ->filter(operator('>=', 4)) // Filter $x where $x >= 4
        ->§                         // Unwrap an array with the ampersand property ->§
    
    == [4, 5]
);

assert(
    §(['hello', 'world'])
        ->map('ucfirst')
        ->fold(operator('.'), '')   // Concatenate all values
                                    // Fold returns a value so no § needed
    == 'HelloWorld';    
);

```

More examples in `tests/Verraes/Tests/Lambdalicious/ExamplesTest.php`


## FAQ

### But but but, objects and fluent interfaces, is it really functional?

Yep. Blows your mind.

### Why does it do X? Why doesn't it do Y?

Dunno, I just built whatever I needed to get it to work for my use case, or whatever was easy to steal.

### Should I use it? Is it ready for production? 

If you can't make that decision for yourself, don't use it.

### How can I contribute?

I like you already! Use it, fix broken stuff, implement missing features from the libs listed below, measure and optimize performance, have awesome ideas.


## Inspired by:

- https://github.com/nikic/iter
- https://gist.github.com/adaburrows/941874
- https://github.com/lstrojny/functional-php
- https://github.com/reactphp/partial
- http://brianhaveri.github.io/Underscore.php/
- http://www.grabmueller.de/martin/www/gallery/misc-3.en.html (Lambda Man)