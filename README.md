# Mutation-Testing

This repository contains some examples and workshops that can be used to play around and understand Mutation-Testing. We are using the great Infection Framework for this which is automatically installed when you set up this project.

## Setup

Install all dependencies

> composer install

## Run tests with PHPUnit

### Tests without coverage report

> vendor/bin/phpunit

### With coverage report

> XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html tests/output

By default, path coverage is disabled to enable it run

> XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html tests/output --path-coverage

## Run tests with Infection

For performance reasons you should always run infection with the `--threads=max` option

> vendor/bin/infection --threads=max

To see which Mutants were created you can run the command with the `--show-mutations` (`-s`) option.

> vendor/bin/infection -s --threads=max

## Introduction

Mutation testing is a methodology to calculate the effectiveness and efficiency of your test suite. Traditional test frameworks like PHPUnit can generate codecoverage reports which are mostly line based ones.

### Coverage

We have three types of coverage

- Line coverage
- Branch coverage
- Path coverage

In PHPUnit you can enable the path coverage in the configuration or via CLI command option. The most efficient one is the path coverage the least one is line coverage. One executed line of code doesn't mean that all possible cases are covered with tests.

### What is Mutation Testing

- Mutates the code under Test
- Gives you an understanding of the test quality
- Tests the effectiveness of your test suite
- Each possible change results in a Mutant
- Tests are executed against the Mutants
- Gives you a way more precise coverage (MSI)

Each line of your code under test will be analysed and possible permuations out of the code will be generated. There are many ways to manipulate the code. See the list below for some of them:

- Changing operators e.g. $a + $b vs. $a - $b
- Remove code lines
- Remove type casting
- Change integer values e.g. 0 to 1
- etc

There are many more checkout https://infection.github.io/guide/mutators.html to get an overview.

### Why should you do Mutation Testing

- Higher confidence in the test quality
- Finds code changes that could break the code
- Shows you what is really covered
- Kind of code review

### References

Mutation Testing
https://en.wikipedia.org/wiki/Mutation_testing

Framework https://infection.github.io/

Talk from the Infection Framework owner
PHPKonf 2021 - Maks Rafalko: Mutation Testing in PHP https://www.youtube.com/watch?v=aDdXTY372Vo

Code Coverage
https://doug.codes/php-code-coverage
