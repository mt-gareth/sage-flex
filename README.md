# PHP Library: SAGE-FLEX
[![Latest Stable Version](https://poser.pugx.org/motiontactic/sage-flex/v/stable)](https://packagist.org/packages/motiontactic/sage-flex)[![Total Downloads](https://poser.pugx.org/motiontactic/sage-flex/downloads)](https://packagist.org/packages/motiontactic/sage-flex)[![License](https://poser.pugx.org/motiontactic/sage-flex/license)](https://packagist.org/packages/motiontactic/sage-flex)

Extends Sage Acorn to add commands to scaffold flexible components quickly

## Install

In sage theme run
```
$ composer require motiontactic/sage-flex
```

## Usage
### Commands

#### Main Scaffolding Command
```text
wp acorn make:flex ComponentName
```
where ComponentName is the name of the new flexible component you would like made.

#### Other Commands
```text
wp acorn make:flex-controller ComponentName
wp acorn make:flex-script ComponentName
wp acorn make:flex-style ComponentName
wp acorn make:flex-template ComponentName
```
Each command makes a single file.

#### An Optional Template Can Be Added To Any Command

```text
wp acorn make:flex ComponentName template
```
Where template is the name of the template you would like to be used, if omitted a default is used.

#### Template Options

```text
default
hero
```
