#Style Guide
If you want to change any part of this please let Matt or I (Steven) know what it is that you're wanting to change.  We are certainly open to changes.

## HTML
I think that HTML is pretty straight forward.  Make sure that you're indenting your code in a manner that makes sense. An example of that might be the following:

```
<div class="test">
    <p>This is a test paragraph.</p>
    <p>This is another test paragraph, this time with a <a href="#stuff" target="_self" title="This is a title">link</a>
    <ul>
        <li>A list item.</li>
        <li>Another list item.</li>
    </ul>
</div>
```

You'll notice a couple things about the above example.  First I have a target tag which points to opening the page in the current page.  This is as it should be.  While we want to keep the user on the page as long as possible, we shouldn't annoy the user unnecessarily.  You can either leave the target off of the link, or use _self.

Next we use the title tag in a bunch of things.  That makes it so that if the user hovers over the item they will get a description of the items that they're looking at.

## CSS
Okay, CSS is also self explanatory.  But a couple things of note:

* CSS selectors should be classes as much as possible.  Think [object oriented CSS](https://code.tutsplus.com/tutorials/object-oriented-css-what-how-and-why--net-6986)
* If you have to use an ID then you must, but keep it sparing. While you don't want to keep things complicated, using an ID means that you can only use things once, where object oriented css should allow you to re-use the same code over and over.

Here's an example of some CSS:
```
html,
body {
    font: normal 14px/26px 'Playfair Display', serif;
}

.container {
    border: 1px #000000 solid; /* black */
    margin: 0 auto;
}

.blue-container {
    background-color: #0000FF; /* blue */
}

.white-text {
    color: #FFFFFF;  /* white */
}
```

Notice that I didn't put the color, and the background color in the same css selector.  While there will be times for doing just that, remember that you want to be able to re-use the code in different areas.

If you have to use the same css code for multiple things put a comma, and then the next item on the next line.

Use the long values for colors, and if you know it put the name of the color in a comment so that we all know which colors are being referred to.

In the future we may end up using SASS, or SCSS, or something else, in the meantime let's keep it simple.

## Javascript
With Javascript, I understand that everyone has a little bit of their own style.  But we want to be consistent.

* Comment the crap out of your Javascript.  Remember we're all learning here, and trying to navigate through someone else's code is a nightmare.
* Braces belong on their own lines.  This is for readability purposes.  Yeah we can put more code on less lines, but to heck with that, we're not worried about doing that, we'll minify the code later on.
* Variables should be camalCase, descriptive, and succinct.
* Use objects as much as possible, objects, and object parameters.
* If you don't have to use braces, DO.
* If you don't have to use a semi-colon, DO.

```
var main = {
    blueMoon: function()
    {
        return 'Once in a while';
    },

    allTheTime: function()
    {
        return 'All the time.';
    }
};
```

## PHP
Same as with Javascript, as much as possible.  We're not going to use EcmaScript 6 so we won't have classes, but in PHP we're going to be using classes all over the place.  If you have to write PHP and it can belong in a class, put it in a class.  Inherit, Extend, remember the [4 pillars of object oriented programming](https://www.linkedin.com/pulse/4-pillars-object-oriented-programming-pushkar-kumar/),

* Inheritance
* Polymorphism
* Encapsulation
* Abstraction

## AJAX
Along with Javascript, and PHP we're going to be using Ajax, this will allow us to make calls to the server without having to have an http refresh.

In order to make that happen it's going to be included in the sapphire.js file which I'm going to be building up to use as the only framework that we're using on this project, and the only one because we're coding it fresh for this project.