You can use for your needs but this package hasn't been tested yet on production and with high load.

Run regex rules from yaml configuration with error messages.


## Install
```bash
make install
```

## Test
```bash
make test
```

## Usage
```bash
php bin/check ValueToCheck%34*1
```


### Sample Yaml file
```
rules:
  -
    regex: /.{5,}/ # at least 5 characters
    error_message: Password length should be at keast 5
  -
    regex: /.*[0-9].*/ # at least must numeric value
    error_message: There should be at least one digit
  -
    regex: /(\b(?:([A-Za-z0-9])(?!\2{2}))+\b)/ # no more then 2 of repeating characters
    error_message: There shouldn't be more than two repeating characters
  -
    regex: /(?=.*[A-Z])|(?=[&@!#+\%\\\+\?])/ # at least one upper case or special char
    # ypu can improve rule by adding more special characters
    error_message: There should be at least one upper case character or a special character
```
