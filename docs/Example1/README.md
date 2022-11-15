# Example 1 Testing the Fibonacci function

## Coverage introduction

Look at the simple `\MutationTesting\Examples\Example1\Fibonacci` class and its single function `fibonacci`. It exposes a single line function with a ternary operator.

By using line coverage from PHPUnit you will see that it's easy to get to 100% line coverage.

Run the following command to get a coverage report (./test/output/index.html) and open it in your browser:

> XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html tests/output

You could now say, good my job is done everything is tested. But there is more! Line coverage is a good starting point but there are others like branch and path coverage.

Run the following command and reload the coverage report in your browser:

> XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html tests/output --path-coverage

As you can see in the report there are more numbers you can look at now. Branch and Path coverage are added to the report. The numbers are now showing that we have:

- 100% Line coverage
- ~66% Branch coverage
- ~25% Path Coverage

This makes clear that not everything is tested. When you look into the different kinds of coverage reports you won't see why exactly this is the case. For this we need to run the Mutation-Tests to see exactly what is tested and what not.

> You will find right next to the class name in the coverage report links to `line`, `branch`, and `path` coverage.

## Mutation Testing introduction

Mutation-Testing helps you to identify tests that are not efficient in terms of uncovered possible changes of your code under test.

Continuing the exercise from above, we will now run Mutation tests with the Infection framework.

Run the following command:

> vendor/bin/infection --threads=max --test-framework-options="--group=Test1"

We use `--test-framework-options="--group=Test1"` to run only the initial test that gives us 100% line coverage. Stay tuned to see how we get to 100% MSI.

What is happening here:

- The initial test suite is executed
- Mutants are generated from your code
- Test suite runs against the created mutants
- Some informational output is printed to the console

For the simple one line `fibonacci` function 16 Mutants where created. This means your code can be changed in 16 different ways you might not have thought about. We also see a very important metric the MSI (Mutation Testing Score) of 31%. That means that our tests are not very efficient in finding possible bugs.

Now, open the created report (./tests/output/mutation/infection.html) in your browser. In the generated report you will be able to look at all the generated mutations of your code. Click the dots next to the executed line of code, and you will see which mutants were created by the framework.

In the end we want to achieve that the tested code has an MSI of 100% which is the real important metric you should look at. For this we need to add more tests and kill as many mutants as created by the framework.

> The `\MutationTesting\Examples\FibonacciTest` test class already contains all methods to get to 100% MSI. They are grouped from 1 to 4 as we need 4 test cases to get to the expected MSI for this simple 1 line function.

Now run the test with the next possible group and look into the coverage report created by the Mutation-Testing framework.

Repeat this until group Test4.

