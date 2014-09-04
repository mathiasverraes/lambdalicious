# Lambdalicious

Experiments in Elegant Functional Programming in PHP

![Lambda Man by Martin Grabmüller](docs/lambda-man.jpg "Lambda Man by Martin Grabmüller")

[![Build Status](https://travis-ci.org/mathiasverraes/lambdalicious.svg)](https://travis-ci.org/mathiasverraes/lambdalicious)

## Design Goals

- LISPlike Love for Lists!
- Higher order functions baby!
- Gloriously Global!

## Example

```php
<?php
$accounts = [
    pair('Jim', 100),
    pair('Jenny', 30),
    pair('Jack', -50),
    pair('Jules', -43),
];

$negate = function($n) { return -$n; };
$getAmount = partial(method, 'last', [], __);
$isNegative = partial(lt, __, 0);

$totalOutstanding = pipe(
    partial(map, $getAmount, __),
    partial(filter, $isNegative, __),
    partial(map, $negate, __),
    partial(reduce, add, __, 0)
);

assert( $totalOutstanding($accounts) == 93 );
```

## FAQ

**What is this all about?**

Read the [The Little Schemer](http://www.amazon.com/gp/product/0262560992/ref=as_li_tl?ie=UTF8&camp=1789&creative=390957&creativeASIN=0262560992&linkCode=as2&tag=verraesnet-20&linkId=LWAZ2Z4LXEVNZNAH).
Or learn LISP (or Clojure or some variant). There's also some Erlang-ish ideas in there.

**But but but... Global functions? Global constants?**

You're very observant! Don't think of it as polluting the global namespace. Think of it as cleaning up the global namespace!

**Can you backport it to older PHP versions?**

Boring, next question please.

**Should I use it? Is it ready for production?**

Yes! Be a pioneer, be an early adopter, be an innovator! Show your boss you *can* take risks on company time! You are a
strong individual who makes your own decisions, even in the face of constant change and breakage! You are a legend!

**I want to contribute!**

I like you already!

