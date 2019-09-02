# Character Development
This project is about creating characters, and will evolve as we can into saving character data, and creating an environment that people hosting games can get ideas from.

## Getting Started

To start out with this project you will need to download the repository and save it in a place where you typically work on php/mysql websites.

Make sure to make not of where you're downloading the project from. I like to use source tree to manage my projects

### Prerequisites

In order to start working on this project you'll need the following items:
```
Mysql
PHP
A text editor
GIT
A Version Control Software like Source Tree
```

My preference when it comes to working on a project is to work with something called XAMPP, or WAMPP  But my favorite is XAMPP, probably because it looks the best, and it's easiest to wrok with.

You can get XAMPP [here](https://www.apachefriends.org/index.html)

For a text editor, there are many choices out there.  I'm currently using [PHPStorm](https://www.jetbrains.com/phpstorm/), however it's a paid text editor, and there are free options that will do everything that you need plus more. A couple of those options are [Brackets](http://brackets.io/), and [Visual Studio Code](https://code.visualstudio.com/).

There are of course more to choose from, and the only limitations are whether or not you want to pay for the text editor or not.

As for the Version Control Software, you'll need to install [GIT](https://git-scm.com/download/win), so that you can manage the various versions that you'll be working with.  I prefer [Source Tree](https://www.sourcetreeapp.com/)

### Getting the project up and running

Once you have XAMPP, and a text editor installed, the next step is to be able to open the project in your browser.

You can set the project up to run on the url http://localhost/character-development, or you can set it up so that it runs on http://local.character-development.com, it's really up to you.  If you want to work on the project through localhost, then you don't need to worry about the next steps.

#### Setting up the local URL
##### Hosts File
Open up the hosts file in your text editor.
The hosts file can be found here: ```C:\Windows\System32\drivers\etc\hosts```

At this point you'll need to decide what the URL is going to be, we'll use local.character-development.com as an example.

At the end of the file you'll want to put the following line:
```
127.0.0.1       local.character-development.com
```

##### httpd.conf file
Then you'll want to open the httpd.conf file in order to make sure that your virtual hosts line is enabled.

If you installed XAMPP then you'll find the httpd.conf file here: ```C:\xampp\apache\conf\httpd.conf```

find the following line, and remove the ```#``` from the start of the line.

```
# Include conf/extra/httpd-vhosts.conf
```

If it's not there, then don't worry about it.

##### httpd-vhosts.conf file
Then find your httpd-vhosts.conf file.  You should find it here: ```C:\xampp\apache\conf\extra\httpd-vhosts.conf```

Again, what you put in the next set of lines of code are going to depend on what the URL is that you're going to be using, so we'll assume that you're going to call it local.character-development.com, and that you're putting the site in a folder called 'dev' in the C drive.

```
<VirtualHost *>
    DocumentRoot "C:/dev/character-development/public"
    ServerName local.character-development.com
    <Directory "C:/dev/character-development/public">
        AllowOverride all
        Options FollowSymLinks Multiviews Indexes
        Allow from all
        Require all granted
    </Directory>
</VirtualHost>
```

Okay, now you should be able to restart the apache portion of the server, (click the stop button in XAMPP next to Apache, then start)

#### Setting up the database

Since you installed XAMPP you can open the console and click on the "Admin" button on the Mysql row. This will take you to the PHPMyAdmin page. Here you'll create a character_db database.

Unless you've set up a different user and password then the default user and password should be 'root', and '' respectively.  NOTE '' means leave it empty.

Once you've created the database navigate to character_db and then click on the import tab.

Click on the Browse button and find the character_db.sql file in the project folder.

Then click Go.  This will set up the database as it is on the server.

## Tests

At this point we don't have any tests that we need to run on the project.  If that changes, then we'll change this section at that time.

## Deployment

Currently we're pushing to the repository, and then Steven O'Driscoll is pushing to the server. When that changes we'll again change this section.

However should you be pushing to the server until we're ready to push version 1, we're not versioning.

We are however putting comments all over the place.  Make sure to read through the [CONTRIBUTING guide](https://github.com/sijur/character-development/blob/master/CONTRIBUTING.md) in order to find out what we're expecting.

## Built with
This project is going to be basic software, at the most it's only going to be PHP, Mysql, Javascript, HTML, CSS.  

Anything that is built should be handcoded, and built without other frameworks.

This may be changed in the future, however the point of this project at this point; while for the gaming side; it's main purpose is to learn, and grow.  And you can't do that while grabbing frameworks that have the code already built.

## Contributing

Please read [Contributing Guidelines](https://github.com/sijur/character-development/blob/master/CONTRIBUTING.md) for details on how to contribute to the project. Please read our [Code of Conduct Guidelines](https://github.com/sijur/character-development/blob/master/CODE_OF_CONDUCT.md) for our code of conduct.

## Versioning

We use [SemVer](http://semver.org/) for versioning.

## Authors

* **Steven O'Driscoll** - *Initial work*
* **Matthew Brown** - *Initial work*

See also the list of [contributors](https://github.com/sijur/character-development/blob/master/contributers.txt) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details