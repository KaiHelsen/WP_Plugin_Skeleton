# Hookables
## About

**Hookables** are essentially the components of the intended plugin structure. A hookable can contain multiple other Hookables, and every Hookable registers its own hooks.

Hookables will make up the structure of the Plugin itself. Because they are components, the final structure will be a `tree` of connected components. In this version of the plugin skeleton, there are two ways to implement

___
### SKEL_I_Hookable_Component.php

the interface for hookables contains only a single method:
```PHP
public function register_hooks(SKEL_Loader $loader) : void;
```

This method will take an instance of the `SKEL_Loader` and register its internal hooks.
There are multiple ways of using this interface. 

1. Use the `SKEL_Hookable_Branch_Trait` or inherit from the `SKEl_Abstract_Branch` class (which is just an abstract class implementing the interface and using the trait), which converts the class into a branch node in the plugin tree structure. Your class will have to define its child hookable(s) before the `register_hooks()` method is called.
2. Inherit from one of the `SKEL_Abstract_Leaf_*` abstract classes, which represent a leaf node in the plugin tree.
3. Manual implementation

### SKEL_Hookable_Branch_Trait.php

a Trait that will help in the implementation of the `SKEL_I_Hookable_Component`.
it contains three methods:
* `add_hookable()`: add a child hookable to this component
* `remove_child_hookable()`: remove a hookable from the hookables array
* `register_hooks(SKEL_Loader $loader)`: register the added hooks with the `SKEL_Loader`

it will also require its parent implement the `register_own_hooks(SKEL_Loader)` method.

Adding this trait to your class will make it fulfill the `SKEL_I_Hookable_Component` contract, and will make it easier to add branch and leaf hookables.
