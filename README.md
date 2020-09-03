<a href="https://github.com/callebe/perfimater"><img src="imgur.com/a/6XcVUma" title="Perfimater" alt="Perfimater"></a>

***Simple Web Shell and Filemanager made in Php***

# Perfimater

> Acess your server by a browser anyware

> Instable

**Basic info:**

- Depends on Websockets
- Based in dockers
- No database
- Responsive
- HTML 5
- Php 7.0
- MIT license

[![Build Status](http://img.shields.io/travis/badges/badgerbadgerbadger.svg?style=flat-square)](https://travis-ci.org/badges/badgerbadgerbadger) [![Dependency Status](http://img.shields.io/gemnasium/badges/badgerbadgerbadger.svg?style=flat-square)](https://gemnasium.com/badges/badgerbadgerbadger) [![Coverage Status](http://img.shields.io/coveralls/badges/badgerbadgerbadger.svg?style=flat-square)](https://coveralls.io/r/badges/badgerbadgerbadger) [![Code Climate](http://img.shields.io/codeclimate/github/badges/badgerbadgerbadger.svg?style=flat-square)](https://codeclimate.com/github/badges/badgerbadgerbadger) [![Github Issues](http://githubbadges.herokuapp.com/badges/badgerbadgerbadger/issues.svg?style=flat-square)](https://github.com/badges/badgerbadgerbadger/issues) [![Pending Pull-Requests](http://githubbadges.herokuapp.com/badges/badgerbadgerbadger/pulls.svg?style=flat-square)](https://github.com/badges/badgerbadgerbadger/pulls) [![Gem Version](http://img.shields.io/gem/v/badgerbadgerbadger.svg?style=flat-square)](https://rubygems.org/gems/badgerbadgerbadger) [![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org) [![Badges](http://img.shields.io/:badges-9/9-ff6799.svg?style=flat-square)](https://github.com/badges/badgerbadgerbadger)


---

## Installation

```shell
$ sudo docker-compose build
$ sudo docker-compose -up -d
```

---

### Setup

- To install the Let's Encrypt cretification on you website:

> Execute the the tobi312/rpi-certbot image to create a SSL certificate for you server
```shell
$ docker run --name certbot -it -v /PerFiMaTer/certbot/conf:/etc/letsencrypt \
    -p 80:80 -p 443:443 --entrypoint='' tobi312/rpi-certbot sh -c 'certbot certonly ' \
    --standalone -d youserver.com -d youserver.com --email youremail@gmail.com \
    --text --agree-tos --server https://acme-v02.api.letsencrypt.org/directory --rsa-key-size 4096 \
    --verbose --renew-by-default --standalone-supported-challenges http-01''
```

> To renew the certificate 
```shell
$ docker exec -it certbot sh -c 'certbot renew'
```

---

## License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)

- **[MIT license](http://opensource.org/licenses/mit-license.php)**
- Copyright 2015 © <a href="http://fvcproductions.com" target="_blank">FVCproductions</a>.
