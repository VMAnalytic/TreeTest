# TreeTest

**Given:**
   - A tree of arbitrary depth
   - The nodes of the tree have leaves (0 - N)
   - Each sheet has an associated weight - an integer non-zero number
   - The leaves for each node are represented as linked list

**Task**:
   - For each node - sort the leaves by weight without using library sort functions,
     While the sum of the weights of the leaves for each particular node of the tree - should not exceed the given constant _W_,
     The extra leaves are transferred to the next node of the tree (in accordance with the algorithm for traversing the nodes of the tree), the extra leaves of the latter
     Node tree are discarded.