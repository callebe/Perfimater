FROM ubuntu:18.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -yq --no-install-recommends \
    apt-utils \
    iproute2 \
    curl \
    # Install git
    git \
    # Install tools
    openssl \
    nano \
    iputils-ping \
    locales \
    ca-certificates \
    sshfs \ 
    util-linux \
    libfuse-dev \
    sshpass \
    iproute2 \
    && apt-get clean && rm -rf /var/lib/apt/lists/*
    
# Install essential for ttyd
RUN apt-get update && apt-get install -y build-essential \
    cmake \
    git \
    libjson-c-dev \
    libwebsockets-dev

# Install ttyd
RUN git clone https://github.com/tsl0922/ttyd.git /root/ttyd
RUN mkdir /root/ttyd/build && cd /root/ttyd/build && cmake .. && make && make install

EXPOSE 7778

# The password and User
ENV ttydPort "7778"

#Startup Script
COPY ./startupScript.sh /usr/local/bin/
COPY ./ssh_interface.sh /usr/local/bin/ 
RUN ln -s /usr/local/bin/startupScript.sh / # backwards compat
ENTRYPOINT ["startupScript.sh"]
CMD startupScript.sh