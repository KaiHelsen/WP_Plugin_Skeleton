# hookables
## About

**hookables** are essentially the components of the intended plugin structure. A hookable can contain multiple other hookables, and every Hookable registers its own hooks.

hookables will make up the structure of the Plugin itself. Because they are components, the final structure will be a `tree` of connected components. In this version of the plugin skeleton, there are two ways to implement

___
### I_Hookable_Component.php

the interface for hookables contains only a single method:
```PHP
public function register_hooks(Loader $loader) : void;
```

This method will take an instance of the `Loader` and register its internal hooks.
There are multiple ways of using this interface. 

1. Use the `SKEL_Hookable_Branch_Trait` or inherit from the `Abstract_Branch` class (which is just an abstract class implementing the interface and using the trait), which converts the class into a branch node in the plugin tree structure. Your class will have to define its child hookable(s) before the `register_hooks()` method is called.
2. Inherit from one of the `Abstract_Leaf_*` abstract classes, which represent a leaf node in the plugin tree.
3. Manual implementation

### SKEL_Hookable_Branch_Trait.php

a Trait that will help in the implementation of the `I_Hookable_Component`.
it contains three methods:
* `add_hookable()`: add a child hookable to this component
* `remove_child_hookable()`: remove a hookable from the hookables array
* `register_hooks(Loader $loader)`: register the added hooks with the `Loader`

it will also require its parent implement the `register_own_hooks(Loader)` method.

Adding this trait to your class will make it fulfill the `I_Hookable_Component` contract, and will make it easier to add branch and leaf hookables.
