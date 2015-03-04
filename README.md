# Lambdalicious

Experiments in Elegant Functional Programming in PHP.

![Recursive Percy](docs/recursive_percy2.jpg "Recursive Percy")

[![Build Status](https://travis-ci.org/mathiasverraes/lambdalicious.svg)](https://travis-ci.org/mathiasverraes/lambdalicious)

Read [Higher Order Programming](http://verraes.net/2014/11/higher-order-programming/) for an introduction.

## Design Goals

- LISPy Love for Lists!
- Higher order Happiness!
- Posh Partial Application!
- Gloriously Global!

## Example

```php
<?php
atom(@jim, @jenny, @jack, @jules);
$accounts = l(
    pair(jim, 100),
    pair(jenny, 30),
    pair(jack, -50),
    pair(jules, -43)
);

$negate = multiply(-1, __); // __ is a partial application placeholder
$isnegative = lt(__, 0); // lt is short for "less than"
$balance = tail; // Alias tail(), which returns the second item in a pair
$totalOutstanding = pipe( // think *nix pipes and filters
    map($balance, __), 
    filter($isnegative, __), 
    reduce(add, __, 0),
    $negate
);

assert(isequal(
    $totalOutstanding($accounts),
    93
));
```

Find more in the `examples` folder, or read the tests.

## FAQ

**What is this all about?**

Read the [The Little Schemer](http://www.amazon.com/gp/product/0262560992/ref=as_li_tl?ie=UTF8&camp=1789&creative=390957&creativeASIN=0262560992&linkCode=as2&tag=verraesnet-20&linkId=LWAZ2Z4LXEVNZNAH).
Or learn LISP (or Clojure or some variant). There's also some Erlang-ish ideas in there.

**Wait but why?**

Why did I try to build a radio when I was ten? Why did I take apart my father's computer when I was eleven?

**But but but... Global functions? Global constants?**

You're very observant! Don't think of it as polluting the global namespace. Think of it as cleaning up the global namespace!

**Can you backport it to older PHP versions?**

Boring, next question please.

**Wouldn't this all be a lot easier and more elegant using HHVM/Hack?**

I know right?

**Should I use it in production?**

Yes! Be a pioneer, be an early adopter, be an innovator! Show your boss you *can* take risks on company time! You are a
strong individual who makes your own decisions, even in the face of constant change and breakage! You are a legend!

**Really?**

I don't think you're ready for this curry cuz my codez is too Lamdalicious for ya babe.

**I want to contribute!**

[I like you already!](https://github.com/mathiasverraes/lambdalicious/blob/master/CONTRIBUTING.md)

![Recursive Mustache](docs/recursive_mustache.jpg "Recursive Mustache")
