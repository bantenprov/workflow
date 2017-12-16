1. Complete the method in workflow class
2. Add desktop notification when transition was change
3. Add mail notification when transition was change
4. Create static method like:
```
$content = Workflow::whereStateIs($state_id)->get();
```
