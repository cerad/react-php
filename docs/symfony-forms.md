## FormInterface - group of forms in a hierarchy
* extends \ArrayAccess, \Traversable, \Countable
* setParent(FormInterface $parent = null);
* getParent();
* add($child, $type = null, array $options = array());
* get($name); - child with a given name
* has($name);
* remove($name);
* all();
* getErrors($deep = false, $flatten = true);
* setData($modelData);
* getData();
* getNormData(); - after submission
* getViewData(); - transformed by the value transformer
* getExtraData();
* getConfig();
* getName();
* getPropertyPath();
* addError(FormError $error);
* isValid();
* isRequired();
* isDisabled();
* isEmpty();
* isSynchronized(); - Transformations have been performed
* getTransformationFailure();
* initialize(); - call after construction
* handleRequest($request = null);
* submit($submittedData, $clearMissing = true);
* getRoot();
* isRoot();
* createView(FormView $parent = null);

## FormFactoryInterface
* create            ($type = 'form', $data = null, array $options = array()); returns FormInterface
* createNamed($name, $type = 'form', $data = null, array $options = array()); returns FormInterface
* createForProperty($class, $property, $data = null, array $options = array());
* createBuilder     ($type = 'form', $data = null, array $options = array()); returns FormBuilderInterface
* createNamedBuilder($name, $type = 'form', $data = null, array $options = array());
* createBuilderForProperty($class, $property, $data = null, array $options = array());

## FormFactoryBuilderInterface - basically a container
* A builder for FormFactoryInterface objects.
* getFormFactory(); - should be create
* _
* setResolvedTypeFactory(ResolvedFormTypeFactoryInterface $resolvedTypeFactory);
* addExtension (FormExtensionInterface $extension);
* addExtensions(array $extensions);
* addType (FormTypeInterface $type);
* addTypes(array $types);
* addTypeExtension (FormTypeExtensionInterface $typeExtension);
* addTypeExtensions(array $typeExtensions);
* addTypeGuesser (FormTypeGuesserInterface $typeGuesser);
* addTypeGuessers(array $typeGuessers);


## FormTypeInterface
* buildForm (FormBuilderInterface $builder, array $options);
* buildView (FormView $view, FormInterface $form, array $options);
* finishView(FormView $view, FormInterface $form, array $options);
* configureOptions(OptionsResolver $resolver);
* getParent returns formTypeInterface
* getName

## AbstractType (Should be AbstractFormType)
* implements FormTypeInterface

## FormBuilderInterface
* extends \Traversable, \Countable, FormConfigBuilderInterface
* getForm(); - should be create form
* _
* add($child, $type = null, array $options = array());
    * child - string|int|FormBuilderInterface
    * type -  string|    FormTypeInterface
* create($name, $type = null, array $options = array()); - Creates form builder
* get($name); - child by name
* has($name); remove($name); all();
* -
* getFormFactory() - Not in interface but implemented for subscribers

## FormView (no interface), really just a node
* implements \ArrayAccess, \IteratorAggregate, \Countable
* public $vars = [ 'value' => null, 'attr' => [] ];
* TODO - What is in value and attr?
* public $parent;
* public children = [];
* __construct(FormView $parent = null)
* private $rendered = false;
* isRendered()
* setRendered()

## Symfony Controller form.factory
* createForm($type, $data = null, array $options = array())
* createFormBuilder($data = null, array $options = array())

    $form = $formFactory->create(FormType, $data, $options);
    $form->handleRequest(); // or submit
    $form->isValid();
    $form->createView();
    
    $data = ['password' => ''];
    $formBuilder = $formFactory->createBuilder('form', $data, $options);
    $formBuilder->add('password','text',$options);
    $form = $formBuilder->getForm();
    
## In a subscriber
* FormEvents::PRE_SET_DATA
* $data = $event->getData();
* $form = $event->getForm();
* $form->add($this->formFactory->createNamed('agegroup', 'entity', null, $options))

## Process
* FormFactory
* FormBuilder
* FormTypes
* Form
    * handleRequest - bind data
    * validate
* FormView
* render
* form_widget
* actual twig block

## Goal

* Trying to have react type view components which can render themselves.
* The render method returns html
* Some can render to html input elements.
* No twig
* No separate template files
* Testable

## Goal Forms
* Need to be able to bind values to these input elements.
* The binding data needs to come from a posted requested.
