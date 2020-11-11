# PHP Library: SAGE-FLEX
[![Latest Stable Version](https://poser.pugx.org/motiontactic/sage-flex/v/stable)](https://packagist.org/packages/motiontactic/sage-flex)[![Total Downloads](https://poser.pugx.org/motiontactic/sage-flex/downloads)](https://packagist.org/packages/motiontactic/sage-flex)[![License](https://poser.pugx.org/motiontactic/sage-flex/license)](https://packagist.org/packages/motiontactic/sage-flex)

Extends Sage Acorn to add commands to scaffold flexible components quickly

## Install

In sage theme run
```
composer require motiontactic/sage-flex
```
To publish files that are used in most sites run:
```
wp acorn publish:mt
```
these files will be added or updated:
```text
/app/View/Composers/Flex.php
/resources/assets/scripts/app.js
/resources/assets/styles/app.scss
/resources/assets/scripts/flex/index.js
/resources/assets/styles/flex/index.scss

/resources/assets/scripts/common/index.js
/resources/assets/scripts/common/responsive-bgs.js

/resources/assets/styles/common/fonts.scss
/resources/assets/styles/common/global.scss
/resources/assets/styles/common/grid.scss
/resources/assets/styles/common/index.scss
/resources/assets/styles/common/mixins.scss
/resources/assets/styles/common/spacing-modifiers.scss
/resources/assets/styles/common/variables.scss

/resources/views/partials/bg.blade.php
/resources/views/partials/content-page.blade.php

mu-plugins/site.php
mu-plugins/site/composer.json
mu-plugins/site/advanced-custom-fields-pro
```
## Usage
### Commands

#### Main Scaffolding Command
```text
wp acorn make:flex ComponentName
```
Where ComponentName is the name of the new flexible component you would like made, should be in CamelCase.

```text
wp acorn remove:flex ComponentName
```
Where ComponentName is the name of the old flexible component you would like removed, should be in CamelCase.

#### Other Commands
```text
wp acorn make:flex-controller ComponentName
wp acorn make:flex-script ComponentName
wp acorn make:flex-style ComponentName
wp acorn make:flex-template ComponentName

wp acorn remove:flex-controller ComponentName
wp acorn remove:flex-script ComponentName
wp acorn remove:flex-style ComponentName
wp acorn remove:flex-template ComponentName
```
Each command makes or removes a single file.

```text
wp acorn publish:flex
wp acorn publish:base-files
wp acorn publish:acf
```
Each command published files that are used on most sites.

#### An Optional Template Can Be Added To Any Make Command

```text
wp acorn make:flex ComponentName template
```
Where template is the name of the template you would like to be used, if omitted a default is used.

#### Template Options

```text
default
hero
```
