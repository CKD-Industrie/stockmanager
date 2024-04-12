# StockManager

Branch:
- main
 - dev
  - feature/no-ref/descriptor-admin


# Branch name convention

### Category
  - **feature**: is for adding, refactoring or removing a feature
  - **bugfix**: is for fixing a bug
  - **hotfix**: is for changing code with a temporary solution and/or without following the usual process (usually because of an emergency)
  - **test**: is for experimenting outside of an issue/ticket
  - **docs**: is for writing, updating, or fixing documentation

### Reference

After the category, there should be a "/" followed by the reference of the issue/ticket you are working on. If there's no reference, just add "no-ref".

### Description

After the reference, there should be another "/" followed by a description which sums up the purpose of this specific branch. This description should be short and "kebab-cased".

### Examples:
  - You need to add, refactor or remove a feature: **`git branch feature/issue-42/create-new-button-component`**
  - You need to fix a bug: **`git branch bugfix/issue-342/button-overlap-form-on-mobile`**
  - You need to fix a bug really fast (possibly with a temporary solution): **`git branch hotfix/no-ref/registration-form-not-working`**
  - You need to experiment outside of an issue/ticket: **`git branch test/no-ref/refactor-components-with-atomic-design`**
  - You need to update documentations **`git branch docs/no-ref/update-readme`**

# Commit name convention

### Category
  - **feat**: is for adding a new feature
  - **fix**: is for fixing a bug
  - **refactor**: is for changing code for peformance or convenience purpose (e.g. readibility)
  - **chore**: is for everything else (writing documentation, formatting, adding tests, cleaning useless code etc.)

After the category, there should be a ":" announcing the commit description.

### Description

After the colon, the commit description should consist in short statements describing the changes.

Each statement should start with a verb conjugated in an imperative way. Statements should be seperated from themselves with a ";".

### Examples:
  - **`git commit -m 'feat: add new button component; add new button components to templates'`**
  - **`git commit -m 'fix: add the stop directive to button component to prevent propagation'`**
  - **`git commit -m 'refactor: rewrite button component in TypeScript'`**
  - **`git commit -m 'chore: write button documentation'`**

### Sources :
- [dev.to](https://dev.to/varbsan/a-simplified-convention-for-naming-branches-and-commits-in-git-il4)
- [medium.com](https://medium.com/@abhay.pixolo/naming-conventions-for-git-branches-a-cheatsheet-8549feca2534)
