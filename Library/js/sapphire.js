/**
 * The global function housing the sapphire framework.
 *
 * version: 0.0.1
 * author: steven o'driscoll
 *
 * This is just to help me learn more about frameworks in general.
 */
(function( global )
{
    "use strict";

    /**
     * Check to see if the sapphire framework has been
     * loaded.  If so stop loading this one.
     */
    if ( global.sapphire )
    {
        return false;
    }

    /**
     * Sapphire Framework constructor.
     *
     * @constructor
     */
    var Sapphire = function()
    {
        /**
         * The version number.
         *
         * @type {string}
         */
        this.version = '0.0.1';

        /**
         * This is going to store the errors.
         * @type {Array}
         */
        this.errors = [];
    };

    Sapphire.prototype =
    {
        /**
         * reset the constructor.
         */
        constructor: Sapphire,

        /**
         * Chris says this is generally a bad idea,
         * and yet he does it and lets the developers
         * decide what is best for their project.
         *
         * I'm not sure if I'm going to use this in my
         * framework, but I better learn how it works.
         */
        augment: function( settings )
        {
            if ( settings && typeof settings === 'object' )
            {
                var prototype = this.constructor.prototype;
                for ( var property in settings )
                {
                    if ( settings.hasOwnProperty( property ) )
                    {
                        prototype[ property ] = settings[ property ];
                    }
                }
            }
            return this;
        }
    };

    /**
     * This allows new modules to be added to the framework.
     *
     * The curious thing is why do I need augment, when I
     * have this...
     *
     * Good question to find an answer to.
     * todo: find out why both of these, augment, and extend.
     */
    Sapphire.prototype.extend = ( function()
    {
        return Sapphire.prototype;
    })();

    /**
     * This gives me some variables to work with.  They all
     * refer to the Sapphire frame work.
     *
     * @type {Sapphire}
     */
    var sapphire = global._s = global.sap = global.sapphire = new Sapphire();

    /**
     * These are going to be the base functions in the framework.
     * These will be inherited as I extend the framework out.
     */
    sapphire.augment(
    {
        /**
         * Like any good programmer, we need to find a way to get
         * the errors.  So, we might as well start with errors.
         */

        /**
         * Add an error to this.errors array.
         * @param {string} error
         */
        addError: function( error )
        {
            this.errors.push( error );
        },

        /**
         * Return the last error.
         *
         * @returns {boolean}
         */
        getLastError: function()
        {
            var errors = this.errors;
            /**
             * This returns the last error.
             * the pop function removes the last element from
             * the array and returns it.
             *
             * Since we're caching out the errors from this.errors
             * we don't need to worry about removing the last error
             * from the array, that array is okay.
             */
            return (errors.length) ? errors.pop() : false;
        },

        /**
         * We're parsing the query string from the url.
         *
         * @param {string} str
         */
        parseQueryString: function( str )
        {
            str = str || global.location.search;
            var objURL = {},
                regExp = /([^?=&]+)(=([^&]*))?/g;

            /**
             * I get parameters, but it seems like we have
             * too many here... what are a, and c for when
             * we're only using b, and d...
             *
             * todo: find out what the deal is with all the params.
             */
            str.replace( regExp, function( a, b, c, d )
            {
                objURL[b] = d;
            });

            /**
             * we'll create the function isEmpty() here in a bit.
             */
            return ( this.isEmpty( objURL ) === false ) ? objURL : false;
        },

        /**
         * A function to get the params from the query string.
         *
         * @param {string} str
         *
         * @returns {*}
         */
        getParams: function( str )
        {
            return this.parseQueryString( str );
        },

        /**
         * checking if the object is empty.
         *
         * @param {object} obj
         *
         * @returns {boolean}
         */
        isEmpty: function( obj )
        {
            if ( obj && typeof obj === 'object' )
            {
                /**
                 * loop through and check to see if it belongs to the object.
                 */
                for ( var key in obj )
                {
                    /**
                     * check to see if the object has a property key.
                     */
                    if ( obj.hasOwnProperty( key ) )
                    {
                        return false;
                    }
                }
            }
            return true;
        },

        ajax: function(prop)
        {
            var data = new FormData();
            data.append('data', JSON.stringify(prop.data));

            var xhr = new XMLHttpRequest();
            xhr.open(prop.type, prop.url, true);

            xhr.onerror = function()
            {
                console.log( 'ERROR' );
            };

            xhr.onload = function()
            {
                console.log(this);
                if (this.status === 200)
                {
                    prop.callBack(this.response);
                }
            };

            xhr.send(data);
        }
    });

})( this );