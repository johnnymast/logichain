[![Run Pest Tests](https://github.com/johnnymast/workflow-php/actions/workflows/tests.yml/badge.svg)](https://github.com/johnnymast/workflow-php/actions/workflows/tests.yml)

# workflow-php (Work in Progress)

## Description

Todo ..

You might want to add a simple thing where you can debug the reason of failure.


# Did i overengineer this class?

At first glance you might say yes! In the first local versions i just used to have the Workflow class and the sucess and failed methods.
The downside of this was that i had failed but i had no concept of what have might wrong in the workflow causing it to fail. 

If you are a backend engineer (like my self) you know how anoying errors without context can be. So i added the [WorkflowResult](src/WorkflowResult.php) and [WorkflowContext](src/WorkflowContext.php) so the there would
alway be a concept of the source (the context) and the status of the Workflow with the [WorkflowResult](src/WorkflowResult.php) that will also be passed to the failed callback.
This is how the project became a litle more technical but also more usefull in the end.


## Todo examples

- [ ] Add a real world scenario and also use this for documentation.
- [ ] Extend Workflow and closely lock down types


## Basic

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus iaculis, mi at pretium commodo, libero mi convallis tellus, 
id volutpat lectus turpis vel turpis. Phasellus id luctus risus, in commodo mi. Phasellus tempus quis tellus sit amet malesuada. 
Donec ultrices justo sed libero blandit, ac efficitur tellus sagittis. Etiam vulputate ante id nisi volutpat cursus. 
Morbi pretium euismod laoreet. Donec elementum volutpat ante, eu tempus arcu malesuada non. Nam mauris arcu, 
ornare a rutrum vitae, rutrum vitae massa. Suspendisse viverra ex ut ipsum commodo, id aliquet nibh tincidunt. 
Quisque ac purus ac quam faucibus bibendum. Nunc a rhoncus lorem. Nulla imperdiet gravida ipsum, vitae suscipit 
libero condimentum sed. Aenean eget diam iaculis, viverra nisi vel, suscipit massa. Sed ac arcu urna.

[Basic Examle](basic.php)


MIT License

Copyright (c) 2026 Johnny Mast <mastjohnny@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
