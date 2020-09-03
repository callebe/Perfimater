FROM ubuntu:18.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -yq --no-install-recommends \
    apt-utils \
    iproute2 \
    curl \
    # Install git
    git \
    # Install apache
    apache2 \
    # Install php 7.2
    libapache2-mod-php7.2 \
    php7.2-cli \
    php7.2-json \
    php7.2-curl \
    php7.2-fpm \
    php7.2-gd \
    php7.2-ldap \
    php7.2-mbstring \
    php7.2-mysql \
    php7.2-soap \
    php7.2-sqlite3 \
    php7.2-xml \
    php7.2-zip \
    php7.2-intl \
    php-imagick \
    # Install essential for ttyd
    build-essential \
    cmake \
    libjson-c-dev \
    libwebsockets-dev \
    # Install tools
    openssl \
    nano \
    graphicsmagick \
    imagemagick \
    ghostscript \
    mysql-client \
    iputils-ping \
    locales \
    sqlite3 \
    ca-certificates \
    sshfs \ 
    util-linux \
    libfuse-dev \
    sshpass \
    iproute2 \
    wget \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install ttyd
RUN git clone https://github.com/tsl0922/ttyd.git /root/ttyd
RUN mkdir /root/ttyd/build && cd /root/ttyd/build && cmake .. && make && make install

# The ttyd user
ENV ttydPort "7778"

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable the Reverse Proxy
RUN a2enmod proxy  proxy_http proxy_ajp rewrite deflate headers proxy_balancer proxy_connect proxy_html

# Instalando o docker
RUN curl -fsSL https://get.docker.com -o get-docker.sh
RUN sh get-docker.sh

# Set locales
RUN locale-gen en_US.UTF-8 en_GB.UTF-8 de_DE.UTF-8 es_ES.UTF-8 fr_FR.UTF-8 it_IT.UTF-8 km_KH sv_SE.UTF-8 fi_FI.UTF-8

# Configure PHP for TYPO3
COPY typo3.ini /etc/php/7.2/mods-available/
RUN phpenmod typo3
# Configure apache for TYPO3
RUN a2enmod rewrite expires
RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/servername.conf
RUN a2enconf servername
# Configure vhost for TYPO3
COPY typo3.conf /etc/apache2/sites-available/
RUN a2dissite 000-default
RUN a2ensite typo3.conf
RUN rm -r /var/www/
RUN mkdir /var/www/

EXPOSE 80 443 7778

WORKDIR /var/www/

HEALTHCHECK --interval=5s --timeout=3s --retries=3 CMD curl -f http://localhost || exit 1

#Startup Script
COPY ./startupScript.sh /usr/local/bin/
RUN ln -s /usr/local/bin/startupScript.sh / # backwards compat
ENTRYPOINT ["startupScript.sh"]

CMD startupScript.sh
